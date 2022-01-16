<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokumenController extends Controller
{

    public function index()
    {
        $dokumen = Dokumen::get();
        return view('admin.dokumen.index', compact('dokumen'));
    }


    public function create()
    {
        return view('admin.dokumen.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'Dokumen' => 'required:unique:dokumen,nama_dokumen'
        ]);

        Dokumen::create([
            'nama_dokumen' => ucwords(strtolower($request->Dokumen)),
            'status' => '1'
        ]);

        return redirect(route('admin.dokumen'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Dokumen']);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $Dokumen = Dokumen::findOrFail($id);
        return view('admin.dokumen.edit', compact('Dokumen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Dokumen' => 'required'
        ]);

        Dokumen::find($id)->update([
            'nama_dokumen' => ucwords(strtolower($request->Dokumen))
        ]);

        return redirect(route('admin.dokumen'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengedit Dokumen']);

    }

    public function destroy($id)
    {
            $Dokumen = Dokumen::findOrFail($id);
            $Dokumen->delete();

            return redirect(route('admin.dokumen'))->with(['jenis' => 'danger','pesan' => 'Berhasil Menghapus Dokumen']);
    }

    public function aktif($id){
        $tahunajaran = Dokumen::find($id);

        if($tahunajaran->status == 1){
            $tahunajaran->status = 0;
        }else{
            $tahunajaran->status = 1;
        }

        $tahunajaran->save();

        return redirect()->back();
    }
}
