@extends('tampilan.apputama')
@section('title', 'Data Kelas')
@section('subtitle', 'Halaman Data Kelas Pemilih')
    
@section('content')
<div class="container">
<div class="row">
<div class="col-12">
<div class="card">
  @error('kode_kelas')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  @error('nama_kelas')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    <div class="card-header">
      <h3 class="card-title">Tabel Data Seluruh Kelas</h3>
      <div class="card-tools">
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Kode Kelas</th>
          <th>Nama Kelas</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($datakelas as $kelas)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$kelas->kode_kelas}}</td>
            <td>{{$kelas->nama_kelas}}</td>
            <td>
              <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_detail-{{$kelas->id}}"><i class="fas fa-eye"></i> Detail</a>
              <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{$kelas->id}}"><i class="fas fa-edit"></i> Edit</a>
              <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{$kelas->id}}"><i class="fas fa-trash-alt"></i> Hapus</a>
            </td>
          </tr> 
          <!-- Modal Hapus -->
                <div class="modal fade" id="_hapus-{{$kelas->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{ route('datakelas.destroy', $kelas->id) }}">
                          @method('DELETE')
                          @csrf
                          <div class="card-body">
                            <h5>Apakah Anda Yakin Akan Mengahapus Data <strong>{{ $kelas->nama_kelas }}</strong> ?</h5>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                      </div>
                    </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->

          <!-- Modal Edit -->
              </div>
              <div class="modal fade" id="_edit-{{ $kelas->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Kelas</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('datakelas.update', $kelas->id )}}">
                        @method("PUT")
                        @csrf
                        <div class="card-body">
                          <label for="kodeEkskul">Kode Kelas</label>
                          <input class="form-control" type="text" id="" name="kode_kelas" placeholder="Masukan Kode Kelas" value="{{ old('kode_kelas', $kelas->kode_kelas)}}">
                          <br>
                          <label for="namaEkskul">Nama Kelas</label>
                          <input class="form-control" type="text" id="" name="nama_kelas" placeholder="Masukan Nama Kelas" value="{{ old('nama_kelas', $kelas->nama_kelas)}}">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->

            <!-- Modal Detail -->
                </div>
                <div class="modal fade" id="_detail-{{ $kelas->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Data Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('datakelas.show', $kelas->id)}}">
                          @method("GET")
                          @csrf
                          <div class="card-body">
                            <dl class="row">
                              <dt class="col-sm-4">Kode Kelas  :</dt>
                              <dd class="col-sm-8">{{$kelas->kode_kelas}}</dd>
                              <dt class="col-sm-4">Nama Kelas  :</dt>
                              <dd class="col-sm-8">{{$kelas->nama_kelas}}</dd>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>No</th>
          <th>Kode Kelas</th>
          <th>Nama Kelas</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
</div>
{{-- Awal Popup Modal --}}
<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Kelas Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ action('App\Http\Controllers\KelasController@store')}}">
          @csrf
          <div class="card-body">
            <label for="kodeEkskul">Kode Kelas</label>
            <input class="form-control" type="text" id="" name="kode_kelas" class="@error('kode_kelas') is-invalid @enderror" placeholder="Masukan Kode Kelas">
            <label for="namaEkskul">Nama Kelas</label>
            <input class="form-control" type="text" id="" name="nama_kelas" class="@error('nama_kelas') is-invalid @enderror" placeholder="Masukan Nama Kelas">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- Akhir Popup Modal --}}
  @include('sweetalert::alert')
  @endsection

  @section('javascript')
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  </script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection