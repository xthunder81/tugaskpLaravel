@extends('layouts.app')

@section('titlePage')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>Rp. 8.700.000,-</p>
            </div>
            <div class="small-box-footer">Formulir MM</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>Rp. 8.700.000,-</p>
            </div>
            <div class="small-box-footer">Formulir PMS</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>Rp. 8.700.000,-</p>
            </div>
            <div class="small-box-footer">Pendaftaran MM</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>Rp. 8.700.000,-</p>
            </div>
            <div class="small-box-footer">Pendaftaran PMS</div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Grand Total</h3>

                <p>Rp. 8.700.000,-</p>
            </div>
            <!-- <div class="small-box-footer">Formulir MM</div> -->
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jurusan[0]->kuota }}</h3>
            </div>
            <div class="small-box-footer">Sisa Kuota MM</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jurusan[1]->kuota }}</h3>
            </div>
            <div class="small-box-footer">Sisa Kuota PMS</div>
        </div>
    </div>
    <div class="col-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3> MM : -</h3>
                <h3> PMS : -</h3>
            </div>
            <div class="small-box-footer">Formulir Belum Kembali</div>
        </div>
    </div>
</div>
@endsection
