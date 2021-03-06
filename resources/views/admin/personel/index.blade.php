@extends('layouts.app')

@section('titlePage')
    Management Personel
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                          <a class="btn btn-primary" href="{{ route('admin.personel.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
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
                                <th>No</th>
                                <th>nip</th>
                                <th>Nama</th>
                                <th>Level Akses</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($personel as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->nip }}</td>
                                    <td>{{ $a->nama_admin }}</td>
                                    <td>{{ $a->level }}</td>
                                    <td>{{ $a->status_admin == 0 ? "Tidak Aktif" : "Aktif" }}</td>
                                    <td>
                                        <a class="btn {{ $a->status_admin == 0 ? "btn-success" : "btn-warning" }} btn-xs" href="{{ route('admin.personel.aktif', $a->id_admin) }}" @if($a->status_admin == 0) onclick="return confirm('Yakin ingin MENGAKTIFKAN Personel ini?')" @else onclick="return confirm('Yakin ingin MENONAKTIFKAN Personel ini?')" @endif>@if($a->status_admin == 0)<i class="nav-icon fas fa-check"></i> Aktifkan @else <i class="nav-icon fas fa-times"></i> Nonaktifkan @endif</a>
                                        <a class="btn btn-primary btn-xs" href="{{ route('admin.personel.edit', $a->id_admin) }}"  data-toggle="tooltip" data-placement="top" title="Edit Personel"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{{ route('admin.personel.resetPassword', $a->id_admin) }}" onclick="return confirm('Yakin ingin RESET PASSWORD Personel ini?')" data-toggle="tooltip" data-placement="top" title="Reset Password Personel"><i class="fas fa-sync-alt"></i></a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('admin.personel.destroy', $a->id_admin) }}" onclick="return confirm('Yakin ingin HAPUS Personel ini?')" data-toggle="tooltip" data-placement="top" title="Hapus Personel"><i class="nav-icon fas fa-trash"></i></a>
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
        <a class="btn btn-primary" href="{{ route('admin.personel.create') }}">Tambah Data</a>
    </div>
    @if(Session::has('pesan'))
        <p class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</p>
    @endif

@endsection
