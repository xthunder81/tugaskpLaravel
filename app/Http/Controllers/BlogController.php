<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function blogView (){
        $blog = DB::table('blog')
        ->select('blog.*')
        ->get();

        return view('admin.blog.index', compact('blog'));
    }

    public function blogCreate(){
        return view('admin.blog.create');
    }

    public function blogStore(Request $req){
        $this->validate($req, [
            'judul' => 'required|unique:blog,judul',
            'teks' => 'required',
        ]);


        Blog::create([
            'judul' => $req->judul,
            'teks' => $req->teks
        ]);

		return redirect()->route('admin.blog')->with(['jenis' => 'success','pesan' => 'Berhasil Menambah Blog']);
    }

    public function blogEdit($id){
        $blog = Blog::findOrFail($id);

        return view('admin.blog.edit',compact('blog'));
    }

    public function blogUpdate(Request $req){
        $this->validate($req, [
            'id' => 'required',
            'judul' => 'required|unique:blog,judul',
            'teks' => 'required'
        ]);

        $blog = Blog::findOrFail($req->id);
        $blog->judul = $req->judul;
        $blog->teks = $req->teks;
        $blog->save();

        return redirect()->route('admin.blog')->with(['jenis' => 'success','pesan' => 'Berhasil Mengubah Blog']);;
    }

    public function blogDestroy($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog')->with(['jenis' => 'success','pesan' => 'Berhasil Menghapus blog']);
    }
}
