@extends('layouts.app')

@section('titlePage')
    Management Biaya Daftar Ulang
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('admin.listbiaya.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
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
                                <th>Nama List Pembayaran</th>
                                <th>Rincian Biaya</th>
                                <th>Total Biaya</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listBiaya as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_list_pembayaran}}</td>
                                    <td>{{$data->rincian_list_pembayaran}}</td>
                                    <td>{{$data->biaya}}</td>
                                    <td>
                                        <a class="btn {{ $data->status_list_pembayaran == 0 ? "btn-success" : "btn-warning" }} btn-xs" href="{{ route('admin.listbiaya.aktif', $data->id_list_pembayaran) }}" @if($data->status_list_pembayaran == 0) onclick="return confirm('Yakin ingin MENGAKTIFKAN Personel ini?')" @else onclick="return confirm('Yakin ingin MENONAKTIFKAN Personel ini?')" @endif>@if($data->status_list_pembayaran == 0)<i class="nav-icon fas fa-check"></i> Aktifkan @else <i class="nav-icon fas fa-times"></i> Nonaktifkan @endif</a>
                                        <a href="{{ route('admin.listbiaya.edit', $data->id_list_pembayaran)}}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit List Biaya">
                                            <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.listbiaya.destroy', $data->id_list_pembayaran)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin MENGHAPUS List Biaya ini?')" type="submit" data-toggle="tooltip" data-placement="top" title="Hapus List Biaya"><i class="fas fa-trash"></i></button>
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
