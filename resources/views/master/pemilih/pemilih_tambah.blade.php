@extends('tampilan.apputama')
@section('title', 'Tambah Pemilih')
@section('subtitle', 'Halaman Tambah Pemilih')

@section('content')
<div class="container-fluid">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Untuk Tambah Pemilih</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
                <form method="POST" action="{{ action('App\Http\Controllers\PemilihController@store')}}">
                    @csrf
                    <div class="card-body">
                      <label for="kodeEkskul">Nama Pemilih</label>
                      <input class="form-control" type="text" id="" name="name" class="@error('name') is-invalid @enderror" placeholder="Masukan Nama Pemilih">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="Alamat Email" autofocus>
                      <label for="namaEkskul">NIS Sekolah</label>
                      <input class="form-control" type="text" id="" name="nis" class="@error('nis') is-invalid @enderror" placeholder="Masukan NIS Sekolah">
                      <label for="kodeEkskul">Kelas Pemilih</label>
                      <select class="form-control" id="" name="kelas" class="@error('kelas') is-invalid @enderror">
                        <option value="">Pilih Kelas</option>
                      @foreach ($kelaspemilih as $kelas)
                      <option value="{{ $kelas->id }}">{{ $kelas->kode_kelas }}</option>
                      @endforeach
                      </select>
                      <label for="position-option">Role Pemilih</label>
                      <select class="form-control" id="roles" name="roles">
                        <option>Pilih Role</option>
                        <option value="Pemilih">Pemilih</option>
                        <option value="Administrator">Administrator</option>
                      </select>
                      <label for="namaEkskul">Status Pemilih</label>
                      <select class="form-control" id="status" name="status">
                        <option value="BELUM">BELUM</option>
                        <option value="SUDAH">SUDAH</option>
                      </select>
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password" class="@error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="{{ route('datapemilih.index') }}" data-aos="fade-up" data-aos-offset="-500" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> KEMBALI </a>
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                  </form>
                </div>
              </div>
            </form>
        </div>
    </div>
        <!-- /.card -->
  @include('sweetalert::alert')
@endsection