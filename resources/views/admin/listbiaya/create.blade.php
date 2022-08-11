@extends('layouts.app')

@section('titlePage')
    Tambah Biaya Daftar Ulang
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form action="{{ route('admin.listbiaya.store') }}" method="post" role="form" id="quickForm">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Biaya</label>
                            <input type="text" name="nama_list_pembayaran" class="form-control @error('nama_list_pembayaran') is-invalid @enderror" id="nama_list_pembayaran" value="{{ old('nama_list_pembayaran') }}" placeholder="Nama Biaya">
                            @error('nama_list_pembayaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-13 mb-2">
                            <label for="name">Rincian Biaya Daftar Ulang</label>
                            <textarea class="form-control @error('rincian_list_pembayaran') is-invalid @enderror" id="exampleFormControlTextarea1" name="rincian_list_pembayaran" rows="3" placeholder="Rincian Biaya Daftar Ulang">{{ old('rincian_list_pembayaran') }}</textarea>
                            @error('rincian_list_pembayaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Biaya</label>
                            <input type="text" name="Biaya" class="form-control @error('Biaya') is-invalid @enderror" id="Biaya" value="{{ old('Biaya') }}" placeholder="Total Biaya">
                            @error('Biaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
