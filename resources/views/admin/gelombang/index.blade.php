@extends('layouts.app')

@section('titlePage')
    Management Gelombang
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('admin.gelombang.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>

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
                                <th>Nomor</th>
                                <th>Nama Gelombang</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Kuota</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gelombang as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_gelombang}}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->mulai)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->selesai)->format('d M Y') }}</td>
                                    <td>{{$data->kuota}} / {{$data->kuota_max}} </td>
                                    <td>{{ $data->status == 1 ? "Aktif" : "Tidak Aktif"}}</td>
                                    <td>
                                        <a class="btn {{ $data->status == 0 ? "btn-success" : "btn-warning" }} btn-xs" href="{{ route('admin.gelombang.aktif', $data->id_gelombang) }}" @if($data->status == 0) onclick="return confirm('Yakin ingin MENGAKTIFKAN Gelombang ini?')" @else onclick="return confirm('Yakin ingin MENONAKTIFKAN Gelombang ini?')" @endif>@if($data->status == 0)<i class="nav-icon fas fa-check"></i> Aktifkan @else <i class="nav-icon fas fa-times"></i> Nonaktifkan @endif</a>
                                        <a href="{{ route('admin.gelombang.edit', $data->id_gelombang)}}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Gelombang">
                                            <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.gelombang.destroy', $data->id_gelombang)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Yakin ingin MENGHAPUS Gelombang ini?')" data-toggle="tooltip" data-placement="top" title="Edit Gelombang"><i class="fas fa-trash"></i></button>
                                        </form>
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
