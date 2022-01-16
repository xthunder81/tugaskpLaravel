@extends('layouts.app')

@section('titlePage')
    Tambah Formulir
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <!-- form start -->
            <form action="{{ route('pendaftaran.store') }}" method="post" role="form" id="quickForm">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <select class="form-control" name="formulir">
                            @foreach($formulir as $f)
                                <option value="{{ $f->id_formulir }}">{{ $f->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="kaos_olahraga" name="kaos_olahraga">
                                <label for="kaos_olahraga" class="custom-control-label">Kaos Olahraga</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="jas_almamater" name="jas_almamater">
                                <label for="jas_almamater" class="custom-control-label">Jas Almamater</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="topi" name="topi">
                                <label for="topi" class="custom-control-label">Topi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="ikat_pinggang" name="ikat_pinggang">
                                <label for="ikat_pinggang" class="custom-control-label">Ikat Pinggang</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="baju_batik" name="baju_batik">
                                <label for="baju_batik" class="custom-control-label">Baju Batik</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="baju_praktik" name="baju_praktik">
                                <label for="baju_praktik" class="custom-control-label">Baju Praktik</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="rompi" name="rompi">
                                <label for="rompi" class="custom-control-label">Rompi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="dasi" name="dasi">
                                <label for="dasi" class="custom-control-label">Dasi</label>
                            </div>
                        </div>
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