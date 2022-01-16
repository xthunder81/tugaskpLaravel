@extends('layouts.app')

@section('titlePage')
    Tambah Formulir
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <!-- form start -->
            <form action="{{ route('formulir.store') }}" method="post" role="form" id="quickForm">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat">
                    </div>
                    <div class="form-group">
                        <label for="nohp">No. HP</label>
                        <input type="text" name="nohp" class="form-control" id="nohp" placeholder="Masukkan nomor handphone">
                    </div>
                    <div class="form-group">
                        <label for="asalsekolah">Asal Sekolah</label>
                        <input type="text" name="asalsekolah" class="form-control" id="asalsekolah" placeholder="Masukkan asal sekolah">
                    </div>
                    <div class="form-group">
                        <label>Program Keahlian</label>
                        <select class="form-control" name="programkeahlian">
                            @foreach($jurusan as $j)
                                <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
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