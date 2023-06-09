@extends('tampilan.apputama')
@section('title', 'Edit Profil Pengguna')
@section('subtitle', 'Halaman Edit Profil Pengguna')
    
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-primary card-outline p-2">
              <form method="POST" enctype="multipart/form-data" action="">
                @method("put")
                @csrf
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Name Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name}}" required autocomplete="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ Auth::user()->email}}" required autocomplete="name">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jabatan" class="col-sm-3 col-form-label">Jabatan/ Kelas</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ Auth::user()->kls->kode_kelas }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukan Alamat">{{ Auth::user()->alamat }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Photo Profil</label>
                      <div class="col-sm-9">
                        <img class="profile-user-img img-fluid img-rounded" style="width: 200px"
                     src=""
                     alt="User profile picture">
                     <br>
                     <br>
                        <input type="file" class="form-control" name="foto_profil" >
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit"class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Update Profil</a></button>
                    </div>
                    </form>
                  </form>
            </div><!-- /.card-body -->
          <!-- /.card -->
        </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection