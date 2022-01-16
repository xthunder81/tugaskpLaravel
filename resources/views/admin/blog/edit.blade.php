@extends('layouts.app')

@section('titlePage')
    Edit Blog
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <!-- form start -->
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div><br />
            @endif
            <form action="{{ route('admin.blog.update') }}" method="post" role="form" id="quickForm">
                <input type="hidden" name="id" value="{{ $blog->id_blog }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul..." value="{{ $blog->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Teks</label>
                        <textarea class="form-control summernote" name="teks" id="exampleFormControlTextarea1" rows="5">{{ $blog->teks }}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
@endsection
