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
                <form method="post" action="{{ route('admin.biayagelombang.update', $biayagelombang->id_biaya_gelombang) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Total Biaya</label>
                            <input type="text" name="biaya" class="form-control @error('biaya') is-invalid @enderror" id="biaya" value="{{ $biayagelombang->biaya }}" placeholder="Total Biaya">
                            @error('biaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <div class="col-sm-13 mb-2">
                            <label for="name">Rincian Biaya Daftar Ulang</label>
                            <textarea class="form-control @error('rincian_biaya_daftar_ulang') is-invalid @enderror" id="exampleFormControlTextarea1" name="rincian_biaya_daftar_ulang" rows="3" placeholder="Rincian Biaya Daftar Ulang">{{ $biayagelombang->rincian_biaya_daftar_ulang }}</textarea>
                            @error('rincian_biaya_daftar_ulang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control @error('jurusan_id_jurusan') is-invalid @enderror" name="jurusan_id_jurusan">
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            @error('jurusan_id_jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label>Gelombang</label>
                            <select class="form-control @error('gelombang_id_gelombang') is-invalid @enderror" name="gelombang_id_gelombang">
                                @foreach($gelombang as $j)
                                    <option value="{{ $j->id_gelombang }}">{{ $j->nama_gelombang }}</option>
                                @endforeach
                            </select>
                            @error('gelombang_id_gelombang')
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
