@extends('layouts.app')

@section('titlePage')
    Tambah Dokumen
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form method="post" action="{{ route('admin.dokumen.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <label for="name">Nama Dokumen:</label>
                                    <input type="text" class="form-control @error('Dokumen') is-invalid @enderror" name="Dokumen" value="{{ old('Dokumen') }}" placeholder="Nama Dokumen"/>
                                    @error('Dokumen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
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
