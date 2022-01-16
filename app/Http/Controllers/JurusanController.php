<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Jurusan;

class JurusanController extends Controller
{
        public function index(){
        $jurusan = Jurusan::get();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function create(){
    	return view('admin.jurusan.create');
    }

    public function store(Request $request){
    	$request->validate([
    		'nama_jurusan' => 'unique:jurusan|required',
    	]);

    	Jurusan::create([
    		'nama_jurusan' => $request->nama_jurusan,
    	]);

    	return redirect(route('admin.jurusan'))->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Jurusan']);

    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jurusan' => 'unique:jurusan|required',
        ]);

        Jurusan::find($id)->update([
            'nama_jurusan' => $request->nama_jurusan,

        ]);
        return redirect(route('admin.jurusan'))->with(['jenis' => 'success','pesan' => 'Berhasil Mengubah Jurusan']);
    }

    public function destroy($id)
    {
        $jurusan= Jurusan::findOrFail($id);
                $jurusan->delete();
            return redirect(route('admin.jurusan'))->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus Jurusan']);
        }

}
