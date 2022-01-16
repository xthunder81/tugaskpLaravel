<?php

namespace App\Http\Controllers;

use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NilaiController extends Controller
{

    public function index()
    {
        $nilai = Nilai::get();
        return view('admin.nilai.index', compact('nilai'));
    }


    public function create()
    {
        return view('admin.nilai.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'Nilai' => 'required'
        ]);

        Nilai::create([
            'nama_nilai' => ucwords(strtolower($request->Nilai)),
            'status' => '1'
        ]);

        return redirect(route('admin.nilai'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Nilai']);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $Nilai = Nilai::findOrFail($id);
        return view('admin.nilai.edit', compact('Nilai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nilai' => 'required'
        ]);

        Nilai::find($id)->update([
            'nama_nilai' => ucwords(strtolower($request->Nilai))
        ]);

        return redirect(route('admin.nilai'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengedit Nilai']);

    }


    public function destroy($id)
    {
            $Nilai = Nilai::findOrFail($id);
            $Nilai->delete();

            return redirect(route('admin.nilai'))->with(['jenis' => 'danger','pesan' => 'Berhasil Menghapus Nilai']);
    }

    public function aktif($id){
        $nilai = Nilai::find($id);

        if($nilai->status == 1){
            $nilai->status = 0;
        }else{
            $nilai->status = 1;
        }

        $nilai->save();

        return redirect()->back();
    }
}
