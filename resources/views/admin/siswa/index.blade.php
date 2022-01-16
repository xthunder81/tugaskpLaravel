@extends('layouts.app')

@section('titlePage')
    Management Siswa
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Siswa</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <!-- <a href="{{ route('admin.siswa.create') }}"><button type="button" class="btn btn-block bg-gradient-primary btn-sm" style="margin-top:10px">TAMBAH</button></a> -->
                            </div>
                        </div>
                        @if(session()->get('success'))
                            <br />
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @elseif(session()->get('error'))
                            <br />
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($siswa as $data)
                                <tr>
                                    <td>{{$data->id_siswa}}</td>
                                    <td>{{$data->nisn}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>

                                    <a class="btn btn-primary btn-xs" href="{{ route('admin.siswa.resetPassword', $data->id_siswa) }}" onclick="return confirm('Yakin ingin RESET PASSWORD Siswa ini?')"><i class="fas fa-sync-alt"></i> Reset Password</a>
                                        <!-- <a href="{{ route('admin.siswa.edit', $data->id_siswa)}}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a> -->
                                        <form action="{{ route('admin.siswa.destroy', $data->id_siswa)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin MENGHAPUS Siswa ini?')" type="submit" data-toggle="tooltip" data-placement="top" title="Hapus Siswa"><i class="fas fa-trash"></i></button>
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
