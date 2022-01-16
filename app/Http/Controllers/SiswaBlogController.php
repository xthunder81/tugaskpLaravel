<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Blog;

class SiswaBlogController extends Controller
{
    public function index(){
        $blog = Blog::orderBy('updated_at', 'DESC')->paginate(5);

        return view('siswa.blog.index', compact('blog'));
    }

    public function show($id){
        $blog = Blog::findOrFail($id);

        return view('siswa.blog.show', compact('blog'));
    }
}
