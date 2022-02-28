@extends('layouts.app')

@section('titlePage')
    Tambah Tahun Ajaran
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <!-- form start -->
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div><br />
            @endif
            <form action="{{ route('admin.tahunajaran.store') }}" method="post" role="form" id="quickForm">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control" id="nama" placeholder="Masukkan tahun ajaran">
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
