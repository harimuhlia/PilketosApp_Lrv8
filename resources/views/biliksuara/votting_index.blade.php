@extends('tampilan.apputama')
@section('title', 'Votting Kandidat')
@section('subtitle', 'Halaman Pilihan Kandidat OSIS')

@section('content')
<div class="container">
  <div class="d-flex justify-content-around">
  @if(Auth::user()->status == "BELUM")
  @foreach ($kandidat as $kddt)
  <form enctype="multipart/form-data" action="{{route('vottingkandidat.store')}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
    <input type="hidden" name="kandidat_id" value="{{ $kddt->id }}" class="form-control">
  <div class="row" data-aos="fade-up" data-aos-offset="300"> 
      <div class="pricing-box p-2">
        <h1 align="center">PASLON {{$loop->iteration}}</h1>
        <img class="img-fluid img-circle mx-auto d-block" src="{{ asset('fotopasangan/'.$kddt->foto_pasangan) }}" style="width: 250px" alt="Responsive image">
        <br>
        <p class="text-center"><strong>{{$kddt->pasangan_kandidat}}</strong></p>
        <a href="{{ route('vottingkandidat.show',$kddt->id) }}" align="center" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> VISI DAN MISI</a>
        <button name="kandidat_id" type="submit" value="{{$kddt->id}}" align="center" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan memilih Kandidat {{ $kddt->pasangan_kandidat }} ?')"><i class="fas fa-vote-yea"></i> PILIH KANDIDAT</button>
      </div>
    </div> 
  </form>
    @endforeach
    @else 
      <h1 align="center">ANDA SUDAH MEMILIH</h1>
    </div>
    <form align="center" id="logout-form" action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();" class="nav-link">
    <button type="button" class="btn btn-danger btn-large" id="logout-form"><i class="fas fa-sign-out-alt"></i> Silakan LOGOUT</button>
    {{ csrf_field() }}
    </form>
    @endif
    </div>
  </div>
</div>
@include('sweetalert::alert')
@endsection