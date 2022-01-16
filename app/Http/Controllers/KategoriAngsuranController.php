<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\KategoriCicil;
use Illuminate\Support\Facades\DB;

class KategoriAngsuranController extends Controller
{
    public function kategoriangsuranView (){
        $angsuran = KategoriCicil::all();
        return view('admin.kategoriangsuran.index', compact('angsuran'));
    }

    public function kategoriangsuranCreate(){
        return view('admin.kategoriangsuran.create');
    }

    public function kategoriangsuranStore(Request $req){
        $this->validate($req, [
            'nama_angsuran' => 'required|unique:kategori_cicil,nama_cicil'
        ]);

        DB::table('kategori_cicil')->insert([
			'nama_cicil' => $req->nama_angsuran,
		]);

		return redirect()->route('admin.kategoriangsuran')->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Kategori Angsuran']);
    }

    public function kategoriangsuranEdit($id){
        $kategoriangsuran = KategoriCicil::findOrFail($id);

        return view('admin.kategoriangsuran.edit',compact('kategoriangsuran'));
    }

    public function kategoriangsuranUpdate(Request $req){
        $this->validate($req, [
            'id' => 'required',
            'nama_angsuran' => 'required|unique:kategori_cicil,nama_cicil'
        ]);

        $angsuran = KategoriCicil::findOrFail($req->id);
        $angsuran->nama_cicil = $req->nama_angsuran;
        $angsuran->save();

        return redirect()->route('admin.kategoriangsuran');
    }

    public function kategoriangsuranDestroy($id){
        $angsuran = KategoriCicil::findOrFail($id);
        $angsuran->delete();

        return redirect()->route('admin.kategoriangsuran')->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus Kategori Angsuran']);
    }
}
