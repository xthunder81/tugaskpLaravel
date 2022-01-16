<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Siswa;
use App\Formulir;
use App\Dokumen;
use App\Nilai;
use App\KomponenNilai;
use App\Pembayaran;
use App\KomponenDokumen;
use App\StatusPendaftaran;
use Illuminate\Support\Facades\DB;
use PDF;

class DaftarulangController extends Controller
{
    public function index(){
        $daftarulang = DB::table('pembayaran')
        ->select('pendaftaran.*' ,'jurusan.*','biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*')
        ->join('pendaftaran', 'pendaftaran.id_pendaftaran','=','pembayaran.pendaftaran_id')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('jurusan', 'jurusan.id_jurusan','=','biaya_gelombang.jurusan_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->where('pembayaran.jenis_pembayaran', 1)
        ->where('tahun_ajaran.status', 1)
        ->get();

        return view('admin.daftarulang.index', compact('daftarulang'));
    }

    public function show($id){
        $formulir = DB::table('pendaftaran')
        ->select('pendaftaran.*' ,'jurusan.*','biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('jurusan', 'jurusan.id_jurusan','=','biaya_gelombang.jurusan_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->join('pembayaran', 'pembayaran.pendaftaran_id','=','pendaftaran.id_pendaftaran')
        ->where('pembayaran.jenis_pembayaran', 1)
        ->where('pendaftaran.id_pendaftaran', $id)
        ->first();

        $dokumen = Dokumen::where('status',1)->get();
        $dok_siswa = [];
        for($i=0;$i<count($dokumen);$i++){
            $komponen_dokumen = KomponenDokumen::where('dokumen_id', $dokumen[$i]->id_dokumen)->where('siswa_id', $id)->first();

            if($komponen_dokumen != null){
                array_push($dok_siswa, $komponen_dokumen);
            }else{
                array_push($dok_siswa, null);
            }
        }

        $nilai = Nilai::where('status',1)->get();
        $nil_siswa = [];
        for($i=0;$i<count($nilai);$i++){
            $komponen_nilai = KomponenNilai::where('nilai_id', $nilai[$i]->id_nilai)->where('siswa_id', $id)->first();

            if($komponen_nilai != null){
                array_push($nil_siswa, $komponen_nilai);
            }else{
                array_push($nil_siswa, null);
            }
        }

        $statusPendaftaran = StatusPendaftaran::where('pendaftaran_id' , $id)->first();

        return view('admin.daftarulang.show', compact('formulir','dokumen','dok_siswa','nilai','nil_siswa','statusPendaftaran'));
    }

    public function verifikasi($id){
        $pembayaran = Pembayaran::where('pendaftaran_id', $id)->where('jenis_pembayaran', 1)->first();

        if($pembayaran->metode_pembayaran == null){
            $pembayaran->metode_pembayaran = 0;
        }

        $pembayaran->status_pembayaran = 1;
        $pembayaran->admin_id  = \Auth::guard('admin')->user()->id_admin;
        $pembayaran->save();


        return redirect()->route('admin.daftarulang')->with(['jenis' => 'success','pesan' => 'Berhasil Verifikasi Daftar Ulang']);;
    }
}
