@extends('tampilan.apputama')
@section('title', 'Detail Votting Kandidat')
@section('subtitle', 'Halaman Detail Visi Misi Kandidat OSIS')

@section('content')
<div class="container">
  <div class="row" data-aos="fade-up" data-aos-offset="-500">
      <a href="{{ route('vottingkandidat.index') }}" data-aos="fade-up" data-aos-offset="-500" class="btn btn-primary"><i class="fa fa-arrow-left"></i> KEMBALI KE DAFTAR KANDIDAT</a>
    <div class="col-sm-12">
      <div class="d-sm-flex justify-content-between align-items-center mb-2">
      </div>
    </div>
  </div>
  <div class="row" data-aos="fade-up" data-aos-offset="-300">
      <div class="col-sm-4">
        <h2 class="text-amount mb-4 mt-2" align="center">Paslon No. {{ $kandidat->id }}</h2>
        <div class="pricing-box">
          <img src="{{ asset('fotopasangan/'.$kandidat->foto_pasangan) }}" class="card-img-top" alt="{{ $kandidat->name }}">
            <br>
            <br>
          <h3 align="center">{{ $kandidat->pasangan_kandidat }}</h3>
          <h4 align="center">{{ $kandidat->keterangan }}</h4>
          <br>
          <br>
         </div>
      </div>
      <div class="col-sm-8">
        <br>
        <br>
        <div class="">
          <table class="table table-bordered">
            <tr>
              <th width="20%">No. Urut</th>
              <td>Paslon No. {{ $kandidat->id }}</td>
            </tr>
            <tr>
              <th width="20%">Nama Lengkap</th>
              <td>{{ $kandidat->pasangan_kandidat }}</td>
            </tr>
            <tr>
              <th>Keterangan <br> <small>(Keterangan, Visi, Misi, Tentang dan lain-lain)</small></th>
              <td>
                {!! $kandidat->visi_kandidat !!}
                {!! $kandidat->misi_kandidat !!}
              </td>
            </tr>
          </table>
          
        </div>
      </div>
  </div>
</div>
@include('sweetalert::alert')
@endsection