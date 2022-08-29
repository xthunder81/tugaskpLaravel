<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \App\Jurusan;
use \App\Admin;
use \App\TahunAjaran;
use \App\Siswa;
use \App\Pembayaran;
use \App\StatusPendaftaran;
use \App\daftarGelombang;
use Illuminate\Support\Facades\DB;
use App\Exports\PresensiSiswa;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AdminController extends Controller
{
    public function index(){
        // $jurusan = Jurusan::all();
        $siswa = Siswa::all();

        $dataDiriLengkap = 0;

        foreach($siswa as $s){
            foreach($s->toArray() as $key => $value)
            {
                if($value == null){
                    $dataDiriLengkap++;
                    break;
                }
            }
        }

        $dataDiriLengkap = count($siswa) - $dataDiriLengkap;

        $riwayat = DB::table('pendaftaran')
                ->select('pendaftaran.id_pendaftaran', 'pendaftaran.nomor_ujian','gelombang.daftar_gelombang_id','daftar_gelombang.nama_daftar_gelombang','tahun_ajaran.nama_tahun_ajaran')
                ->join('gelombang', 'gelombang.id_gelombang', '=', 'pendaftaran.gelombang_id')
                ->join('daftar_gelombang', 'daftar_gelombang.id_daftar_gelombang','=','gelombang.daftar_gelombang_id')
                ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
                ->where('daftar_gelombang.status_daftar_gelombang', 1)
                ->where('tahun_ajaran.status', 1)
                ->get();

        $registrasi = 0;
        $menungguVerifikasiPembayaranFormulir = 0;
        $menungguDiterima = 0;
        $diterima = 0;
        $tidakDiterima = 0;
        $menungguVerifikasiPembayaranDaftarUlang = 0;
        $sudahDiterimadiSekolah = 0;
        $hasilDariDaftarUlang = 0;
        foreach($riwayat as $r){

            // $cekBayarFormulir = Pembayaran::where('pendaftaran_id', $r->id_pendaftaran)->where('jenis_pembayaran', '0')->first();
            $cekBayarFormulir = DB::table('pembayaran')
                                ->select('pembayaran.*', 'pendaftaran.*', 'list_pembayaran.*')
                                ->join('pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'pembayaran.pendaftaran_id')
                                ->join('list_pembayaran', 'list_pembayaran.id_list_pembayaran', '=', 'pembayaran.list_pembayaran_id')
                                ->where('pendaftaran_id', $r->id_pendaftaran)
                                ->where('list_pembayaran.tipe_pembayaran', 0)
                                ->first();
            $cekDiterima = StatusPendaftaran::where('pendaftaran_id', $r->id_pendaftaran)->first();

            if($cekDiterima !=null){
                // $cekBayarDaftarulang = Pembayaran::where('pendaftaran_id', $r->id_pendaftaran)->where('jenis_pembayaran', '1')->first();
                $cekBayarDaftarulang = DB::table('pembayaran')
                                        ->select('pembayaran.*', 'pendaftaran.*','list_pembayaran.*')
                                        ->join('pendaftaran', 'pendaftaran.id_pendaftaran', '=', 'pembayaran.pendaftaran_id')
                                        ->join('list_pembayaran', 'list_pembayaran.id_list_pembayaran', '=', 'pembayaran.list_pembayaran_id')
                                        ->where('pendaftaran_id', $r->id_pendaftaran)
                                        ->where('list_pembayaran.tipe_pembayaran', 1)
                                        ->first();
                if(!$cekBayarDaftarulang && $cekDiterima->status_id == 2){
                    //Siswa tidak diterima
                    $tidakDiterima++;
                }
                else if($cekBayarDaftarulang->status_pembayaran == 1){
                //Pembayaran Sudah Diverifikasi
                $hasilDariDaftarUlang = $hasilDariDaftarUlang + $r->biaya;
                $sudahDiterimadiSekolah++;


                }
                else if($cekDiterima->status_pembayaran == null && $cekBayarDaftarulang->bukti_pembayaran != null){
                    //sudah bayar formulilr nunggu verifikasi admin
                    $menungguVerifikasiPembayaranDaftarUlang++;
                }
                else if($cekDiterima->status_id == 1){
                    //diterima belum bayar
                    $diterima++;
                }
            }
            else if($cekBayarFormulir->status_pembayaran == null && $cekBayarFormulir->bukti_pembayaran != null){
                $menungguVerifikasiPembayaranFormulir++;
            }
            else if($cekBayarFormulir->status_pembayaran == 1){
                //pembayaran formulir approved
                $menungguDiterima++;
            }
            else if($cekBayarFormulir->status_pembayaran == 2 && $cekBayarFormulir->bukti_pembayaran != null){
                //Pembayaran not reject
                // $s=4;
            }
            else{
                $registrasi++;
            }

        }

        $rupiahDariFormulir = ($menungguDiterima + $sudahDiterimadiSekolah + $menungguVerifikasiPembayaranDaftarUlang + $diterima) * env('HARGAFORMULIR','');

        if(!is_integer($rupiahDariFormulir)){
            $rupiahDariFormulir = 0;
        }
        return view('admin.home', compact('siswa','dataDiriLengkap','registrasi','menungguVerifikasiPembayaranFormulir','menungguDiterima','diterima','tidakDiterima','menungguVerifikasiPembayaranDaftarUlang','sudahDiterimadiSekolah','rupiahDariFormulir','hasilDariDaftarUlang'));
    }

    public function tahunajaranView(){
        $tahunajaran = TahunAjaran::all();
        return view('admin.tahunajaran.index',compact('tahunajaran'));
    }

    public function tahunajaranCreate(){
        return view('admin.tahunajaran.create');
    }

    public function tahunajaranStore(Request $req){
        $this->validate($req, [
            'tahun_ajaran' => 'required|min:9|max:9|unique:tahun_ajaran,nama_tahun_ajaran'
        ]);

        DB::table('tahun_ajaran')->update([
			'status' => 0
		]);

        DB::table('tahun_ajaran')->insert([
			'nama_tahun_ajaran' => $req->tahun_ajaran,
			'status' => 1
        ]);


		return redirect()->route('admin.tahunajaran')->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Tahun Ajaran']);
    }

    public function tahunajaranAktif($id){
        $tahunajaran = TahunAjaran::find($id);

        DB::table('tahun_ajaran')->update(['status'=>'0']);

        $tahunajaran->status = 1;
        $tahunajaran->save();

        return redirect()->back()->with(['jenis' => 'success','pesan' => 'Berhasil Mengubah Status Tahun Ajaran']);
    }

    public function tahunajaranEdit($id){
        $tahunajaran = TahunAjaran::findOrFail($id);

        return view('admin.tahunajaran.edit',compact('tahunajaran'));
    }

    public function tahunajaranUpdate(Request $req){
        $this->validate($req, [
            'id' => 'required',
            'tahun_ajaran' => 'required|min:9|max:9|unique:tahun_ajaran,nama_tahun_ajaran'
        ]);

        $tahunajaran = TahunAjaran::findOrFail($req->id);
        $tahunajaran->nama_tahun_ajaran = $req->tahun_ajaran;
        $tahunajaran->save();

        return redirect()->route('admin.tahunajaran');
    }

    public function tahunajaranDestroy($id){
        $tahunajaran = TahunAjaran::findOrFail($id);

        if($tahunajaran->status == 1){
            return redirect()->back()->with(['jenis' => 'danger','pesan' => 'Status harus dinonaktifkan terlebih dahulu']);
        }

        $tahunajaran->delete();

        return redirect()->route('admin.tahunajaran')->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus Tahun Ajaran']);
    }

    public function unduhpresensiView(){
        $daftarulang = DB::table('pendaftaran')
        ->select('pendaftaran.*', 'daftar_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*')
        ->join('daftar_gelombang', 'daftar_gelombang.id_daftar_gelombang','=','gelombang.daftar_gelombang_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->join('pembayaran', 'pembayaran.pendaftaran_id','=','pendaftaran.id_pendaftaran')
        ->where('pembayaran.jenis_pembayaran', 1)
        ->where('pembayaran.status_pembayaran', 1)
        ->where('tahun_ajaran.status', 1)
        ->get();

        if(count($daftarulang) == 0){
            return redirect()->route('admin.home')->with(['jenis' => 'danger','pesan' => 'Belum ada siswa yang terdaftar']);
        }

        return Excel::download(new PresensiSiswa, 'Presensi-Siswa.xlsx');
    }

    public function coba(){
        $pdf = PDF::loadView('admin.coba');
        $pdf->setOption('margin-top',4);
        $pdf->setOption('margin-bottom',2);
        $pdf->setOption('margin-left',3);
        $pdf->setOption('margin-right',3);
        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('Kwitansi-Formulir.pdf');
    }

    public function ubahkatasandi(){
       return view('admin.ubahkatasandi');
    }

    public function ubahkatasandiProses(Request $req){
        $this->validate($req, [
            'sandi' => 'required',
        ]);

        $admin = Admin::findOrFail(\Auth::guard('admin')->user()->id_admin);
        $admin->password = bcrypt($req->sandi);
        $admin->save();

        return redirect()->route('admin.home')->with(['jenis' => 'success','pesan' => 'Berhasil merubah kata sandi']);
    }

    public function personelView () {
        $personel = Admin::all();
        return view('admin.personel.index', compact('personel'));
    }

    public function personelCreate()
    {
        return view('admin.personel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function personelStore(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_admin' => 'required',
            'password' => 'required',
            'level' => 'required',
            'status_admin' => 'required',
        ]);

        Admin::create([
            'nip' => $request->nip,
            'nama_admin' => $request->nama_admin,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            'status_admin' => $request->status_admin,
        ]);

        return redirect(route('admin.personel'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Personel']);
    }

    public function personelEdit($id)
    {
        $personel = Admin::findOrFail($id);
        return view('admin.personel.edit', compact('personel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function personelUpdate(Request $request)
    {

        // $request->validate([
        //     'nip' => 'required',
        //     'nama_admin' => 'required',
        //     'level' => 'required',
        //     'status_admin' => 'required',
        // ]);

        // Admin::find($id)->update([
        //     'nip' => $request->nip,
        //     'nama_admin' => $request->nama_admin,
        //     'level' => $request->level,
        //     'status_admin' => $request->status_admin,
        // ]);

        $this->validate($request, [
            'nip' => 'required',
            'nama_admin' => 'required',
            'level' => 'required',
            'status_admin' => 'required'
        ]);

        $personel = Admin::findOrFail($request->id);
        $personel->nip = $request->nip;
        $personel->nama_admin = $request->nama_admin;
        $personel->level = $request->level;
        $personel->status_admin = $request->status_admin;
        $personel->save();


        return redirect(route('admin.personel'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengedit Personel']);
    }

    public function personelDestroy($id)
    {
        $personel = Admin::findOrFail($id);
        $personel->delete();

        return redirect(route('admin.personel'))->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus Personel']);
    }

    public function personelAktif($id){
        $personel = Admin::findOrFail($id);

        if($personel->status_admin  == 1){
            $personel->status_admin  = 0;
        }else{
            $personel->status_admin  = 1;
        }

        $personel->save();

        return redirect()->back()->with('success','Berhasil Diaktifkan');
    }

    public function personelResetPassword($id){
        $personel = Admin::findOrFail($id);
        $personel->password = bcrypt("Smpt12345");
        $personel->save();

        return redirect(route('admin.personel'))->with('success','Berhasil mereset password menjadi Smpt12345');
    }


}
