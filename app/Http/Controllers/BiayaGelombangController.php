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
        $biayagelombang = DB::table('biaya_gelombang')
        ->select('biaya_gelombang.*', 'gelombang.nama_gelombang')
        ->join('gelombang','gelombang.id_gelombang', 'biaya_gelombang.gelombang_id')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','=','gelombang.tahun_ajaran_id')
        ->where('tahun_ajaran.status', 1)
        ->get();

        return view('admin.biayagelombang.index', compact('biayagelombang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gelombang = DB::table('gelombang')
        ->select('gelombang.*')
        ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran','gelombang.tahun_ajaran_id')
        ->where('tahun_ajaran.status',1)
        ->get();
        return view('admin.biayagelombang.create', compact('gelombang'));
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
            'biaya' => 'required',
            'rincian_biaya_daftar_ulang' => 'required',
            'gelombang_id_gelombang' => 'required',
        ]);

        BiayaGelombang::create([
            'biaya' => $request->biaya,
            'rincian_biaya_daftar_ulang' => $request->rincian_biaya_daftar_ulang,
            'gelombang_id' => $request->gelombang_id_gelombang,
        ]);
        return redirect(route('admin.biayagelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Biaya Gelombang']);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gelombang = Gelombang::get();
        $biayagelombang = BiayaGelombang::findOrFail($id);
        return view('admin.biayagelombang.edit', compact('gelombang','biayagelombang'));
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
            'biaya' => 'required',
            'rincian_biaya_daftar_ulang' => 'required',
            'gelombang_id_gelombang' => 'required',
        ]);

        DB::table('biaya_gelombang')->where('id_biaya_gelombang', $id)->update([
            'biaya' => $request->biaya,
            'rincian_biaya_daftar_ulang' => $request->rincian_biaya_daftar_ulang,
            'gelombang_id' => $request->gelombang_id_gelombang,
        ]);

        return redirect(route('admin.biayagelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengedit Biaya Gelombang']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biayagelombang = BiayaGelombang::findOrFail($id);
        $biayagelombang->delete();

        return redirect(route('admin.biayagelombang'))->with(['jenis' => 'success','pesan' => 'Biaya Gelombang Berhasil dihapus']);
    }

    public function listBiayaIndex() {
        $listBiaya = Daftar_Biaya::all()->where('tipe_pembaran', 2);
        return view('admin.listbiaya.index', compact('listBiaya'));
    }

    public function listBiayaCreate () {
        return view('admin.listbiaya.create');
    }

    public function listBiayaStore(Request $request) {
        $request->validate([
            'nama_list_pembayaran' => 'required',
            'biaya' => 'required',
        ]);

        Daftar_Biaya::create([
            'nama_list_pembayaran' => $request->nama_list_pembayaran,
            'rincian_list_pembayaran' => $request->rincian_list_pembayaran,
            'tipe_pembayaran' => 2,
            'biaya' => $request->Biaya,
            'status_list_pembayaran' => 1,
        ]);
        return redirect(route('admin.listbiaya'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah List Biaya']);
    }

    public function listBiayaEdit ($id) {
        $listBiaya = Daftar_Biaya::findOrFail($id);
        return view('admin.listbiaya.edit', compact('listbiaya'));
    }

    public function listBiayaUpdate (Request $request, $id) {
        $request->validate([
            'nama_list_pembayaran' => 'required',
            'biaya' => 'required',
        ]);

        Daftar_Biaya::find($id)->update([
            'nama_list_pembayaran' => $request->nama_biaya,
            'rincian_list_pembayaran' => $request->rincian_biaya,
            'tipe_pembayaran' => $request->tipe_biaya,
            'biaya' => $request->biaya,
            'status_list_pembayaran' => 1,
        ]);

        return redirect(route('admin.listbiaya'))->with(['jenis' => 'success','pesan' => 'Berhasil Merubah List Biaya']);
    }

    public function listBiayaDestroy ($id) {
        $listBiaya = Daftar_Biaya::findOrFail($id);
        $listBiaya->delete();

        redirect(route('admin.listbiaya'))->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus List Biaya']);
    }
}
