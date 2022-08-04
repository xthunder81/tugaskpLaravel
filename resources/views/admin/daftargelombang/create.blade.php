@extends('layouts.app')

@section('titlePage')
    Tambah Daftar Gelombang
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form action="{{ route('admin.daftargelombang.store') }}" method="post" role="form" id="quickForm">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_daftar_gelombang">Nama Daftar Gelombang</label>
                            <input type="text" name="nama_daftar_gelombang" class="form-control" id="nama_daftar_gelombang" placeholder="Masukkan Nama Daftar Gelombang">
                            <div class="invalid-feedback">
                                Nama Daftar Gelombang tidak boleh kosong
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
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
