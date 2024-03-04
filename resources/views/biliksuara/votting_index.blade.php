@extends('tampilan.apputama')
@section('title', 'Votting Kandidat')
@section('subtitle', 'Halaman Pilihan Kandidat OSIS')

@section('content')
@if(Auth::user()->status == "BELUM")
<div class="container">
  <div class="row">
    @foreach ($kandidat as $kddt)
          <div class="col-md-4">
              <div class="card">
                  <img src="{{ asset('fotopasangan/'.$kddt->foto_pasangan) }}" class="card-img-top" alt="{{ $kddt->name }}">
                  <div class="card-body">
                      <h5 class="card-title">{{ $kddt->name }}</h5>
                      <p class="card-text">{{ $kddt->description }}</p>
                      <form action="{{route('vottingkandidat.store')}}" align="center" method="post">
                          @csrf
                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
                          <input type="hidden" name="kandidat_id" value="{{ $kddt->id }}" class="form-control">
                          <a href="{{ route('vottingkandidat.show',$kddt->id) }}" align="center" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> VISI DAN MISI</a>
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan memilih Kandidat {{ $kddt->pasangan_kandidat }} ?')"><i class="fas fa-vote-yea"></i> PILIH KANDIDAT</button>
                      </form>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
</div>
@else 
      <h1 align="center">ANDA SUDAH MEMILIH</h1>
    </div>
    <form align="center" id="logout-form" action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();" class="nav-link">
    <button type="button" class="btn btn-danger btn-large" id="logout-form"><i class="fas fa-sign-out-alt"></i> Silakan LOGOUT</button>
    {{ csrf_field() }}
    </form>
@endif
@include('sweetalert::alert')
@endsection