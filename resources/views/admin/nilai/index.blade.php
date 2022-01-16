@extends('layouts.app')

@section('titlePage')
    Management Nilai
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('admin.nilai.create') }}"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }} mt-3">{{ Session::get('pesan') }}</p>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <!-- <th>Status</th> -->
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nilai as $data)
                                <tr>
                                    <td>{{$data->nama_nilai}}</td>
                                    <!-- <td>{{$data->status}}</td> -->
                                    <td>

                                        <!-- <a href="{{ route('admin.nilai.aktif', $data->id_nilai)}}" class="btn btn-xs btn-primary"><i class="fas fa-check"></i></a> -->
                                        <a href="{{ route('admin.nilai.edit', $data->id_nilai)}}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                                                        <form action="{{ route('admin.nilai.destroy', $data->id_nilai)}}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Yakin ingin MENGHAPUS Nilai ini?')" class="btn btn-xs btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
