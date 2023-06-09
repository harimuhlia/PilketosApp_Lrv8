@extends('tampilan.apputama')
@section('title', 'Hitung Cepat Suara')
@section('subtitle', 'Halaman Penghitungan Cepat/ Quick Count')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Kandidat</span>
            <span class="info-box-number">
              {{ $totalKandidat }} Pasang Kandidat
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Pemilih</span>
            <span class="info-box-number">{{ $userpemilih }} Pemilih</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
  
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
  
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Belum Memilih</span>
            <span class="info-box-number">{{ $hitungBelumMemilih }} Pemilih</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Suara Masuk</span>
            <span class="info-box-number">{{ $hitungSudahMemilih }} Suara</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <table class="table table-bordered">
        <thead class="table-success">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Kandidat</th>
            <th scope="col">Perolehan Suara</th>
            <th scope="col">Persentase Suara</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($results as $item )
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              <img src="{{ asset('fotopasangan/'.$item->foto_pasangan) }}" alt="" class="img-circle" style="width: 50px">
            </td>
            <td>{{$item->pasangan_kandidat}}</td>
            <td><h4><p class="text-center">{{ $item->count }}</p></h4></td>
            <td><h4><p class="text-center">{{ ($item->count/$jumlah)*100 }} %</p></td>
          </tr>
          @endforeach
          <tr>
            <td colspan="3"><p class="text-center"><strong>GRAND TOTAL</strong></p></td>
            <td><h3><p class="text-center">{{ $totalpemilih }}</p></h3></td>
            <td><h3><p class="text-center">{{ $totalpemilih/$jumlah*100 }} %</p></h3></td>
          </tr>
          <div class="alert alert-danger" role="alert">
            DISCLAIMER:
            <span><strong>PEMILIH</strong> adalah User yang mempunyai Hak Pilih</span> ||
            <span><strong>SUARA</strong> adalah Pemilih yang sudah melakukan Votting</span>
          </div>
        </tbody>
      </table>
</div>
<!-- /.container-fluid -->
</section>
@endsection