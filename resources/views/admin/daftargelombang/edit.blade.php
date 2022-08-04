@extends('layouts.app')

@section('titlePage')
    Edit Daftar Gelombang
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form method="post" action="{{ route('admin.daftargelombang.update',$dgelombang->id_daftar_gelombang) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <label for="name">Nama Daftar Gelombang:</label>
                                    <input type="text" class="form-control @error('nama_daftar_gelombang') is-invalid @enderror" name="nama_daftar_gelombang" value="{{ $dgelombang->nama_daftar_gelombang }}" placeholder="Nama Daftar Gelombang"/>
                                    @error('daftargelombang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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
