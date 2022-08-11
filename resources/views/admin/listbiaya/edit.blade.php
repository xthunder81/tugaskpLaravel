@extends('layouts.app')

@section('titlePage')
Edit Biaya Gelombang
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <!-- form start -->
            <form method="post"
                action="{{ route('admin.listbiaya.update', $listBiaya->id_list_pembayaran) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_list_pembayaran">Nama Biaya</label>
                        <input type="text" name="nama_list_pembayaran" class="form-control @error('nama_list_pembayaran') is-invalid @enderror"
                            id="nama_list_pembayaran" value="{{ $listBiaya->nama_list_pembayaran }}" placeholder="Nama Biaya">
                        @error('nama_list_pembayaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="col-sm-13 mb-2">
                            <label for="name">Rincian Biaya</label>
                            <textarea class="form-control @error('rincian_list_pembayaran') is-invalid @enderror"
                                id="exampleFormControlTextarea1" name="rincian_list_pembayaran" rows="3"
                                placeholder="Rincian Biaya">{{ $listBiaya->rincian_list_pembayaran }}</textarea>
                            @error('rincian_list_pembayaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Total Biaya</label>
                            <input type="text" name="biaya" class="form-control @error('biaya') is-invalid @enderror"
                                id="biaya" value="{{ $listBiaya->biaya }}" placeholder="Total Biaya">
                            @error('biaya')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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
