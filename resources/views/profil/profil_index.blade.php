@extends('tampilan.apputama')
@section('title', 'Profil Pengguna')
@section('subtitle', 'Halaman Profil Pengguna')
    
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-rounded" style="width: 200px"
                     src="{{ asset('Template') }}/dist/img/avatar4.png"
                     alt="User profile picture">
              </div>
              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
              <p class="text-muted text-center">{{ Auth::user()->roles }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-primary card-outline p-2">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Name Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" disabled value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Role User</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->roles }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Level/ Kelas</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->kls->kode_kelas }} ({{ Auth::user()->kls->nama_kelas }})">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="inputExperience" disabled placeholder="Alamat Anda">Jln. Ir. Sutami KM 1,2 Desa. Mauk Barat, Kec. Mauk Tangerang Banten Indonesia 15531</textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                        @if (Auth()->User()->roles == 'Pemilih')
                            <span class="float-centre badge bg-danger">Jika ingin mengubah Biodata/ Data Diri, silakan untuk menghubungi Administrator atau Panitia Pilketos</span>
                        @else
                            <a href="{{ route('datapemilih.index') }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit Profil</a>
                        @endif
                    </div>
                  </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection