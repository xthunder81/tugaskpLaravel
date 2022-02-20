<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Siswa;
use App\Formulir;
use App\Pembayaran;
use App\KomponenDokumen;
use App\StatusPendaftaran;
use App\Dokumen;
use App\Gelombang;
use App\Nilai;
use App\KomponenNilai;
use Illuminate\Support\Facades\DB;
use PDF;

class FormulirController extends Controller
{
    public function index(){
        $formulir = DB::table('pendaftaran')
        ->select('pendaftaran.*' ,'biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->join('pembayaran', 'pembayaran.pendaftaran_id','=','pendaftaran.id_pendaftaran')
        ->where('pembayaran.jenis_pembayaran', 0)
        ->where('tahun_ajaran.status', 1)
        ->get();

        return view('admin.formulir.index', compact('formulir'));
    }

    public function create(){
        $gelombang = Gelombang::all();
        return view('admin.formulir.create', compact('gelombang'));
    }

    public function store(Request $req){
        $petugas = \Auth::user()->id_admin;
        $nama = $req->get('nama');
        $alamat = $req->get('alamat');
        $nohp = $req->get('nohp');
        $asalsekolah = $req->get('asalsekolah');
        $gelombangtersedia = $req->get('gelombangtersedia');

        $siswa = new Siswa();
        $siswa->nama = $nama;
        $siswa->alamat = $alamat;
        $siswa->no_hp = $nohp;
        $siswa->asal_sekolah = $asalsekolah;
        $siswa->save();

        $formulir = new Formulir();
        $formulir->nomor_formulir = "ininomornyaberapa";
        $formulir->status = "1";
        $formulir->user_id = $petugas;
        $formulir->siswa_id = $siswa->id;
        $formulir->gelombang_id = $gelombangtersedia;
        $formulir->save();

        $gelombang = Gelombang::where('id_gelombang',$gelombangtersedia)->firstOrFail();
        $gelombang->kuota = $gelombang->kuota - 1;
        $gelombang->save();

        return redirect()->route('formulir');
    }

    public function show($id){
        $formulir = DB::table('pendaftaran')
        ->select('pendaftaran.*' ,'biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->join('pembayaran', 'pembayaran.pendaftaran_id','=','pendaftaran.id_pendaftaran')
        ->where('pembayaran.jenis_pembayaran', 0)
        ->where('pendaftaran.id_pendaftaran', $id)
        ->first();

        $dokumen = Dokumen::where('status',1)->get();
        $dok_siswa = [];
        for($i=0;$i<count($dokumen);$i++){
            $komponen_dokumen = KomponenDokumen::where('dokumen_id', $dokumen[$i]->id_dokumen)->where('siswa_id', $formulir->id_siswa)->first();

            if($komponen_dokumen != null){
                array_push($dok_siswa, $komponen_dokumen);
            }else{
                array_push($dok_siswa, null);
            }
        }

        $nilai = Nilai::where('status',1)->get();
        $nil_siswa = [];
        for($i=0;$i<count($nilai);$i++){
            $komponen_nilai = KomponenNilai::where('nilai_id', $nilai[$i]->id_nilai)->where('siswa_id', $formulir->id_siswa)->first();

            if($komponen_nilai != null){
                array_push($nil_siswa, $komponen_nilai);
            }else{
                array_push($nil_siswa, null);
            }
        }

        $statusPendaftaran = StatusPendaftaran::where('pendaftaran_id' , $id)->first();

        return view('admin.formulir.show', compact('formulir','dokumen','dok_siswa','nilai','nil_siswa','statusPendaftaran'));
    }

    public function print($id){
        $formulir = DB::table('pendaftaran')
        ->select('pendaftaran.*' ,'biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*', 'admin.*')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->join('pembayaran', 'pembayaran.pendaftaran_id','=','pendaftaran.id_pendaftaran')
        ->join('admin', 'admin.id_admin', '=', 'pendaftaran.admin_id')
        ->where('pembayaran.jenis_pembayaran', 0)
        ->where('pendaftaran.id_pendaftaran', $id)
        ->first();

        $pdf = PDF::loadView('admin.formulir.print', compact('formulir'));
        $pdf->setOption('margin-top',4);
        $pdf->setOption('margin-bottom',2);
        // $pdf->setOption('margin-left',3);
        // $pdf->setOption('margin-right',3);
        $pdf->setPaper('A5', 'landscape');
        return $pdf->stream('Kwitansi-Formulir-'.$formulir->nama.'.pdf');
    }

    public function verifikasi($id){
        $pembayaran = Pembayaran::where('pendaftaran_id', $id)->where('jenis_pembayaran', 0)->first();

        if($pembayaran->metode_pembayaran == null){
            $pembayaran->metode_pembayaran = 0;
        }

        $pembayaran->status_pembayaran = 1;
        $pembayaran->admin_id  = \Auth::guard('admin')->user()->id_admin;
        $pembayaran->save();


        return redirect()->route('admin.formulir')->with(['jenis' => 'success','pesan' => 'Berhasil memverifikasi pembayaran. Silahkan terima siswa ini']);
    }

    public function terima($id){
        Pembayaran::create([
            'pendaftaran_id' => $id,
            'bukti_pembayaran' => null,
            'jumlah' => null,
            'jenis_pembayaran' => '1',
            'metode_pembayaran' => null,
            'status_pembayaran' => null,
            'admin_id' => \Auth::guard('admin')->user()->id_admin,
        ]);

        StatusPendaftaran::create([
            'keterangan' => '',
            'status_id' => 1,
            'pendaftaran_id' => $id
        ]);

        return redirect()->route('admin.formulir')->with(['jenis' => 'success','pesan' => 'Berhasil Menerima Siswa']);
    }

    public function tolak($id){

        StatusPendaftaran::create([
            'keterangan' => '',
            'status_id' => 2,
            'pendaftaran_id' => $id
        ]);

        $increasekuota = DB::table('pendaftaran')
        ->select('pendaftaran.*' ,'biaya_gelombang.*', 'gelombang.*','siswa.*','pembayaran.*')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->join('pembayaran', 'pembayaran.pendaftaran_id','=','pendaftaran.id_pendaftaran')
        ->where('pembayaran.jenis_pembayaran', 0)
        ->where('pendaftaran.id_pendaftaran', $id)
        ->first();

        Gelombang::where('id_gelombang', $increasekuota->id_gelombang)->increment('kuota');
        return redirect()->route('admin.formulir')->with(['jenis' => 'success','pesan' => 'Berhasil Menolak Siswa']);
    }


}
