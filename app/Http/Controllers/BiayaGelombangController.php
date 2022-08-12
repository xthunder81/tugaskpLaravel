<?php

namespace App\Http\Controllers;

use App\BiayaGelombang;
use App\Gelombang;
use App\Jurusan;
use App\TahunAjaran;
use App\Daftar_Biaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\List_;

class BiayaGelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biayaformulir = Daftar_Biaya::get()->where('tipe_pembayaran', 0);
        return view('admin.biayaformulir.index', compact('biayaformulir'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.biayaformulir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_list_pembayaran' => 'required',
        ]);

        Daftar_Biaya::create([
            'nama_list_pembayaran' => $request->nama_list_pembayaran,
            'rincian_list_pembayaran' => $request->rincian_list_pembayaran,
            'tipe_pembayaran' => 0,
            'biaya' => $request->Biaya,
            'status_list_pembayaran' => 1,
        ]);
        return redirect(route('admin.biayaformulir'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Biaya Formulir']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $listBiaya = Daftar_Biaya::findOrFail($id);

        if($biayaformulir->status_list_pembayaran  == 1){
            $biayaformulir->status_list_pembayaran  = 0;
        }else{
            $biayaformulir->status_list_pembayaran  = 1;
        }

        $biayaformulir->save();

        return redirect()->back()->with('success','Berhasil Diaktifkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biayaformulir = Daftar_Biaya::findOrFail($id);
        return view('admin.biayaformulir.edit', compact('biayaformulir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_list_pembayaran' => 'required',
        ]);

        Daftar_Biaya::find($id)->update([
            'nama_list_pembayaran' => $request->nama_list_pembayaran,
            'rincian_list_pembayaran' => $request->rincian_list_pembayaran,
            'biaya' => $request->biaya,
        ]);

        return redirect(route('admin.biayaformulir'))->with(['jenis' => 'success','pesan' => 'Berhasil Merubah Biaya Formulir']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biayaformulir = Daftar_Biaya::findOrFail($id);
        $biayaformulir->delete();

        return redirect(route('admin.biayaformulir'))->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus List Biaya']);
    }

    public function listBiayaIndex() {
        $listBiaya = Daftar_Biaya::get()->where('tipe_pembayaran', 1);
        return view('admin.listbiaya.index', compact('listBiaya'));
    }

    public function listBiayaCreate () {
        return view('admin.listbiaya.create');
    }

    public function listBiayaStore(Request $request) {
        $request->validate([
            'nama_list_pembayaran' => 'required',
        ]);

        Daftar_Biaya::create([
            'nama_list_pembayaran' => $request->nama_list_pembayaran,
            'rincian_list_pembayaran' => $request->rincian_list_pembayaran,
            'tipe_pembayaran' => 1,
            'biaya' => $request->Biaya,
            'status_list_pembayaran' => 1,
        ]);
        return redirect(route('admin.listbiaya'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah List Biaya']);
    }

    public function listBiayaEdit ($id) {
        $listBiaya = Daftar_Biaya::findOrFail($id);
        return view('admin.listbiaya.edit', compact('listBiaya'));
    }

    public function listBiayaUpdate (Request $request, $id) {
        $request->validate([
            'nama_list_pembayaran' => 'required',
        ]);

        Daftar_Biaya::find($id)->update([
            'nama_list_pembayaran' => $request->nama_list_pembayaran,
            'rincian_list_pembayaran' => $request->rincian_list_pembayaran,
            'biaya' => $request->biaya,
        ]);

        return redirect(route('admin.listbiaya'))->with(['jenis' => 'success','pesan' => 'Berhasil Merubah List Biaya']);
    }

    public function listBiayaDestroy ($id) {
        $listBiaya = Daftar_Biaya::findOrFail($id);
        $listBiaya->delete();

        return redirect(route('admin.listbiaya'))->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus List Biaya']);
    }
    public function listBiayaAktif($id){
        $listBiaya = Daftar_Biaya::findOrFail($id);

        if($listBiaya->status_list_pembayaran  == 1){
            $listBiaya->status_list_pembayaran  = 0;
        }else{
            $listBiaya->status_list_pembayaran  = 1;
        }

        $listBiaya->save();

        return redirect()->back()->with('success','Berhasil Diaktifkan');
    }
}
