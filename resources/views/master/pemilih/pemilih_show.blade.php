@extends('tampilan.apputama')
@section('title', 'Detail Pemilih')
@section('subtitle', 'Halaman Seluruh Detail Pemilih')

@section('content')
    <!-- Modal Detail -->
<div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">Nama Pemilih  :</dt>
            <dd class="col-sm-8">{{$pemilih->name}}</dd>
            <dt class="col-sm-4">NIS Pemilih  :</dt>
            <dd class="col-sm-8">{{$pemilih->nis}}</dd>
            <dt class="col-sm-4">Kelas Pemilih  :</dt>
            <dd class="col-sm-8">{{$pemilih->kls->kode_kelas}}</dd>
            <dt class="col-sm-4">Status Pemilih  :</dt>
            <dd class="col-sm-8">
            @if( $pemilih->status == "BELUM")
            <span class="float-centre badge bg-danger">{{ $pemilih->status }} MEMILIH</span>
            @else
            <span class="float-centre badge bg-success">{{ $pemilih->status }} MEMILIH</span>
            @endif
        </dd>
        <a href="{{ route('datapemilih.index') }}" data-aos="fade-up" data-aos-offset="-500" class="btn btn-primary"><i class="fa fa-arrow-left"></i> KEMBALI </a>
</div>
@endsection