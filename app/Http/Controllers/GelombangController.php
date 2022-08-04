<?php

namespace App\Http\Controllers;

use App\Gelombang;
use App\TahunAjaran;
use App\daftarGelombang;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunajaran = TahunAjaran::where('status', '1')->first();

        $gelombang = [];
        if($tahunajaran){
            $gelombang = Gelombang::where('tahun_ajaran_id', $tahunajaran->id_tahun_ajaran)->get();
        }
        return view('admin.gelombang.index', compact('gelombang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahunajaran = TahunAjaran::where('status','1')->get();
        return view('admin.gelombang.create', compact('tahunajaran'));
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
            'nama_gelombang' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'kuota' => 'required',
            'tahunajaran' => 'required',
        ]);

        Gelombang::create([
            'nama_gelombang' => $request->nama_gelombang,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'kuota' => $request->kuota,
            'kuota_max' => $request->kuota,
            'status' => '1',
            'tahun_ajaran_id' => $request->tahunajaran,
        ]);

        return redirect(route('admin.gelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Gelombang']);
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
        $tahunajaran = TahunAjaran::get();
        $gelombang = Gelombang::findOrFail($id);
        return view('admin.gelombang.edit', compact('gelombang', 'tahunajaran'));
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
        $gelombang = Gelombang::findOrFail($id);
        $request->validate([
            'nama_gelombang' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'kuota' => 'required',
            'tahunajaran' => 'required',
        ]);

        Gelombang::find($id)->update([
            'nama_gelombang' => $request->nama_gelombang,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'kuota' => $request->kuota,
            'kuota_max' => $request->kuota,
            'status' => $gelombang->status,
            'tahun_ajaran_id' => $request->tahunajaran,
        ]);

        return redirect(route('admin.gelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengedit Gelombang']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gelombang = Gelombang::findOrFail($id);
        $gelombang->delete();

        return redirect(route('admin.gelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus Gelombang']);
    }


    public function gelombangAktif($id){
        $gelombang = Gelombang::findOrFail($id);

        if($gelombang->status  == 1){
            $gelombang->status  = 0;
        }else{
            $gelombang->status  = 1;
        }

        $gelombang->save();

        return redirect()->back()->with('success','Berhasil Diaktifkan');
    }

    public function daftarGelombangIndex (){
        $dgelombang = daftarGelombang::get();
        return view ('admin.daftargelombang.index', compact('dgelombang'));
    }

    public function daftarGelombangCreate () {
        return view ('admin.daftargelombang.create');
    }

    public function daftarGelombangStore (Request $request) {

        $request->validate([
            'nama_daftar_gelombang' => 'required',
            'status_daftar_gelombang' => 'required',
        ]);

        daftarGelombang::create([
            'nama_daftar_gelombang' => $request->nama_daftar_gelombang,
            'status_daftar_gelombang' => 1,
        ]);

        return redirect(route('admin.daftargelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Daftar Gelombang']);
    }

    public function daftarGelombangEdit ($id) {
        $dgelombang = daftarGelombang::findOrFail($id);
        return view ('admin.daftargelombang.edit', compact('dgelombang'));
    }

    public function daftarGelombangUpdate (Request $request, $id) {
        $request->validate([
            'nama_daftar_gelombang' => 'required',
        ]);

        daftarGelombang::find($id)->update([
            'nama_daftar_gelombang' => $request->nama_daftar_gelombang,

        ]);
        return redirect(route('admin.daftargelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengubah Daftar Gelombang']);

    }

    public function daftarGelombangDestroy ($id) {
        $dgelombang= daftarGelombang::findOrFail($id);
                $dgelombang->delete();
            return redirect(route('admin.daftargelombang'))->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus Daftar Gelombang']);
    }
}
