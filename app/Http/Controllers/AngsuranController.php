<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cicil;
use \App\KategoriCicil;
use Illuminate\Support\Facades\DB;

class AngsuranController extends Controller
{
    public function angsuranView (){
        $angsuran = DB::table('cicil')
        ->select('siswa.*','kategori_cicil.*','cicil.*')
        ->join('siswa', 'siswa.id_siswa','=','cicil.siswa_id')
        ->join('kategori_cicil', 'kategori_cicil.id_kategori_cicil','=','cicil.kategori_cicil_id')
        ->get();

        return view('admin.angsuran.index', compact('angsuran'));
    }

    public function angsuranCreate(){
        $kategori = KategoriCicil::all();
        $siswa = DB::table('pembayaran')
        ->select('pendaftaran.*' ,'jurusan.*','biaya_gelombang.*', 'gelombang.*','tahun_ajaran.*','siswa.*','pembayaran.*')
        ->join('pendaftaran', 'pendaftaran.id_pendaftaran','=','pembayaran.pendaftaran_id')
        ->join('biaya_gelombang', 'biaya_gelombang.id_biaya_gelombang','=','pendaftaran.biaya_gelombang_id')
        ->join('jurusan', 'jurusan.id_jurusan','=','biaya_gelombang.jurusan_id')
        ->join('gelombang', 'gelombang.id_gelombang','=','biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->join('siswa', 'siswa.id_siswa','=','pendaftaran.siswa_id')
        ->where('pembayaran.jenis_pembayaran', 1)
        ->where('pembayaran.status_pembayaran', 1)
        ->where('tahun_ajaran.status', 1)
        ->get();

        return view('admin.angsuran.create', compact('kategori','siswa'));
    }

    public function angsuranStore(Request $req){
        $this->validate($req, [
            'kategori_angsuran' => 'required',
            'siswa' => 'required',
            'nilai_angsuran' => 'required'
        ]);


        DB::table('cicil')->insert([
			'siswa_id' => $req->siswa,
			'kategori_cicil_id' => $req->kategori_angsuran,
            'nilai_cicil' => str_replace(".","",$req->nilai_angsuran),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);

		return redirect()->route('admin.angsuran')->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Kategori Angsuran']);
    }

    public function angsuranEdit($id){
        $angsuran = KategoriCicil::findOrFail($id);

        return view('admin.angsuran.edit',compact('angsuran'));
    }

    // public function angsuranUpdate(Request $req){
    //     $this->validate($req, [
    //         'id' => 'required',
    //         'nama_angsuran' => 'required|unique:kategori_cicil,nama_cicil'
    //     ]);

    //     $angsuran = KategoriCicil::findOrFail($req->id);
    //     $angsuran->nama_cicil = $req->nama_angsuran;
    //     $angsuran->save();

    //     return redirect()->route('admin.angsuran');
    // }

    public function angsuranDestroy($id){
        $angsuran = Cicil::findOrFail($id);
        $angsuran->delete();

        return redirect()->route('admin.angsuran')->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus Angsuran']);
    }
}
