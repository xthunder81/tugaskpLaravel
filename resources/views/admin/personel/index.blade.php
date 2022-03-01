@extends('layouts.app')

@section('titlePage')
    Management Tahun Ajaran
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                          <a class="btn btn-primary" href="{{ route('admin.tahunajaran.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }} mt-3">{{ Session::get('pesan') }}</p>
                        @endif

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tahunajaran as $f)
                                <tr>
                                    <td>{{ $f->nama_tahun_ajaran }}</td>
                                    <td>{{ $f->status == 0 ? "Tidak Aktif" : "Aktif" }}</td>
                                    <td>
                                        <a class="btn {{ $f->status == 0 ? "btn-success" : "btn-warning disabled" }} btn-xs" href="{{ route('admin.tahunajaran.aktif', $f->id_tahun_ajaran) }}" @if($f->status == 0) onclick="return confirm('Yakin ingin MENGAKTIFKAN Tahun Ajaran ini?')" @else onclick="return confirm('Yakin ingin MENONAKTIFKAN Tahun Ajaran ini?')" @endif >@if($f->status == 0)<i class="nav-icon fas fa-check"></i> Aktifkan @else <i class="nav-icon fas fa-times"></i> Nonaktifkan @endif</a>
                                        <a class="btn btn-primary btn-xs" href="{{ route('admin.tahunajaran.edit', $f->id_tahun_ajaran) }}"  data-toggle="tooltip" data-placement="top" title="Edit Tahun Ajaran"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('admin.tahunajaran.destroy', $f->id_tahun_ajaran) }}" onclick="return confirm('Yakin ingin HAPUS Tahun Ajaran ini?')" data-toggle="tooltip" data-placement="top" title="Hapus Tahun Ajaran"><i class="nav-icon fas fa-trash"></i</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('content')
    <div class="row mb-4">
        <a class="btn btn-primary" href="{{ route('admin.tahunajaran.create') }}">Tambah Data</a>
    </div>
    @if(Session::has('pesan'))
        <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
    @endif

@endsection
