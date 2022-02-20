@extends('layouts.app')

@section('titlePage')
    Management Formulir
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('pesan'))
                            <p class="alert alert-{{ Session::get('jenis') }} mt-3">{{ Session::get('pesan') }}</p>
                        @endif
                        <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No Formulir</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Gelombang</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($formulir as $f)

                                    <tr>
                                        <td>{{ $f->id_pendaftaran }}</td>
                                        <td>{{ $f->nama }}</td>
                                        <td>{{ $f->tempat_lahir }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $f->tanggal_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $f->nama_gelombang }}</td>
                                        <td>
                                            @if(\App\StatusPendaftaran::where('pendaftaran_id' , $f->id_pendaftaran)->first() != null)
                                                @if(\App\StatusPendaftaran::where('pendaftaran_id' , $f->id_pendaftaran)->first()->status_id == 1)
                                                    <span class="badge badge-success">Diterima</span>
                                                @else
                                                    <span class="badge badge-warning">Tidak Diterima</span>
                                                @endif
                                            @else
                                                @if($f->status_pembayaran==1)
                                                <span class="badge badge-success" >Terverifikasi </span>
                                            @else
                                                <span class="badge badge-warning" >Belum Verifikasi</span>

                                            @endif
                                            @endif

                                            </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.formulir.show', $f->id_pendaftaran ) }}"><i class="fas fa-eye"></i> View</a>
                                            <!-- <a class="btn btn-primary btn-sm" href="{{ route('admin.formulir.print', $f->id_pendaftaran ) }}">Print</a> -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
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
