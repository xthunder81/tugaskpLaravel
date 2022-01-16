@extends('layouts.app')

@section('titlePage')
    Edit Kategori Cicil
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
            <form action="{{ route('admin.kategoriangsuran.update') }}" method="post" role="form" id="quickForm">
                <input type="hidden" name="id" value="{{ $kategoriangsuran->id_kategori_cicil }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Angsuran</label>
                        <input type="text" name="nama_angsuran" class="form-control" id="nama" placeholder="Masukkan Kategori Angsuran..." value="{{ $kategoriangsuran->nama_cicil }}">
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
