@extends('layouts.app')

@section('titlePage')
    Edit Gelombang
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form method="post" action="{{ route('admin.gelombang.update',$gelombang->id_gelombang) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Daftar Gelombang</label>
                            <select class="form-control @error('dgelombang') is-invalid @enderror" name="dgelombang">
                                @foreach($dgelombang as $d)
                                    <option value="{{ $d->id_daftar_gelombang }}">{{ $d->nama_daftar_gelombang }}</option>
                                @endforeach
                            </select>
                            @error('tahunajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama_gelombang" class="form-control @error('nama_gelombang') is-invalid @enderror" id="nama_gelombang" value="{{ $gelombang->nama_gelombang }}" placeholder="Masukkan nama gelombang">
                            @error('nama_gelombang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="mulai">Mulai</label>
                            <input type="date" name="mulai" class="form-control @error('mulai') is-invalid @enderror" id="mulai" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gelombang->mulai)->format('Y-m-d') }}" placeholder="Mulai">
                            @error('mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="selesai">Selesai</label>
                            <input type="date" name="selesai" class="form-control @error('selesai') is-invalid @enderror" id="selesai" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gelombang->selesai)->format('Y-m-d')  }}" placeholder="Selesai">
                            @error('selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kuota">Kuota</label>
                            <input type="number" name="kuota" class="form-control @error('kuota') is-invalid @enderror" id="kuota" value="{{ $gelombang->kuota }}" placeholder="Kuota">
                            @error('kuota')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select class="form-control @error('tahunajaran') is-invalid @enderror" name="tahunajaran">
                                @foreach($tahunajaran as $j)
                                    <option value="{{ $j->id_tahun_ajaran }}">{{ $j->nama_tahun_ajaran }}</option>
                                @endforeach
                            </select>
                            @error('tahunajaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
