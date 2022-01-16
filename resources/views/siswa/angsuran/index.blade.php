@extends('layouts.siswa')

@section('titlePage')
    Angsuran
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Angsuran Terbaru
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Kategori Angsuran</th>
                                <th>Nilai Angsuran</th>
                                <th>Tanggal</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($angsuran as $a)
                                    <tr>
                                        <td>{{ $a->nama_cicil }}</td>
                                        <td>@uang($a->nilai_cicil)</td>
                                        <td>{{ \Carbon\Carbon::parse($a->created_at)->format('d M Y') }}</td>
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


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Total Angsuran
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatables" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Kategori Angsuran</th>
                                <th>Total Angsuran</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    for($i = 0; $i < count($nama_kategori); $i++){
                                @endphp
                                    <tr>
                                        <td>{{ $nama_kategori[$i] }}</td>
                                        <td>@uang($nilai_kategori[$i])</td>
                                    </tr>
                                @php
                                    }
                                @endphp
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
    </section>

@endsection
