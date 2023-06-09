@extends('tampilan.apputama')
@section('title', 'Data Kandidat Votting')
@section('kandidat_index', 'active')
@section('main', 'show')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data kandidat</h3>
              <div class="card-tools">
                {{-- <a href="" class="btn btn-success btn-sm"><i class="fas fa-upload" title="Tambah Data"></i> Import</a> --}}
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama Pasangan</th>
                  <th>Keterangan</th>
                  <th>Visi Kandidat</th>
                  <th>Misi Kandidat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody> 
                  @foreach ($kandidat as $kddt)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                      <img src="{{ asset('fotopasangan/'.$kddt->foto_pasangan) }}" alt="Chania" class="d-flex align-items-center rounded" style="width: 50%">
                    </td>
                    <td>{{$kddt->pasangan_kandidat}}</td>
                    <td>{{$kddt->keterangan}}</td>
                    <td>{!! Str::limit($kddt->visi_kandidat, 50) !!}</td>
                    <td>{!! Str::limit($kddt->misi_kandidat, 50) !!}</td>
                    <td>
                      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_detail-{{$kddt->id}}"><i class="fas fa-eye"></i> Detail</a>
                      <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{$kddt->id}}"><i class="fas fa-edit"></i> Edit</a>
                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{$kddt->id}}"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                  </tr>

                  <!-- Modal Hapus -->
                <div class="modal fade" id="_hapus-{{$kddt->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data kddt</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{ route('kandidat.destroy', $kddt->id) }}">
                          @method('DELETE')
                          @csrf
                          <div class="card-body">
                            <h5>Apakah Anda Yakin Akan Mengahapus Data <strong>{{ $kddt->pasangan_kandidat }}</strong> ?</h5>
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
              <div class="modal fade" id="_edit-{{ $kddt->id}}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data kddt</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" enctype="multipart/form-data" action="{{ route('kandidat.update', $kddt->id )}}">
                        @method("PUT")
                        @csrf
                        <div class="card-body">
                          <label for="pasangan_kandidat">Nama Pasangan</label>
                          <input class="form-control" type="text" id="" name="pasangan_kandidat" value="{{ old('pasangan_kandidat', $kddt->pasangan_kandidat)}}" class="@error('pasangan_kandidat') is-invalid @enderror" placeholder="Masukan Nama Pasangan">
                          <label for="keterangan">Keterangan</label>
                          <input class="form-control" type="text" id="" name="keterangan" value="{{ old('keterangan', $kddt->keterangan)}}" class="@error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan">
                          <label for="visi_kandidat">Visi Kandidat</label>
                          <textarea class="textarea @error('visi_kandidat') is-invalid @enderror" rows="10" name="visi_kandidat">{{ old('visi_kandidat', $kddt->visi_kandidat)}}</textarea>
                          <label for="misi_kandidat">Misi Kandidat</label>
                          <textarea class="textarea @error('misi_kandidat') is-invalid @enderror" rows="10" name="misi_kandidat">{{ old('misi_kandidat', $kddt->misi_kandidat)}}</textarea>
                          <img src="{{ asset('fotopasangan/'.$kddt->foto_pasangan) }}" alt="Chania" class="mx-auto d-block rounded" style="width: 30%">
                          <label for="foto_pasangan">Foto Pasangan</label>
                          <input class="form-control" type="file" id="" name="foto_pasangan" value="{{ old('keterangan', $kddt->foto_pasangan)}}" class="@error('foto_pasangan') is-invalid @enderror">
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
              <div class="modal fade" id="_detail-{{ $kddt->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Detail Data Kandidat</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{route('kandidat.show', $kddt->id)}}">
                        @method("GET")
                        @csrf
                        <div class="card-body">
                          <dl class="row">
                            <img src="{{ asset('fotopasangan/'.$kddt->foto_pasangan) }}" alt="Chania" class="mx-auto d-block rounded" style="width: 80%">
                            <dd class="col-sm-12 font-weight-bold text-center"><h3>{{$kddt->pasangan_kandidat}}</h3></dd><dd class="col-sm-12 font-weight-bold text-center"><h5>{{$kddt->keterangan}}</h5></dd>
                            <dd class="col-sm-12">{!! $kddt->visi_kandidat !!}</dd>
                            <dd class="col-sm-12">{!! $kddt->misi_kandidat !!}</dd>
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
                  <th>Foto</th>
                  <th>Nama Pasangan</th>
                  <th>Keterangan</th>
                  <th>Visi Kandidat</th>
                  <th>Misi Kandidat</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Kandidat Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\KandidatController@store')}}">
          @csrf
          <div class="card-body">
            <label for="pasangan_kandidat">Nama Pasangan</label>
            <input class="form-control" type="text" id="" name="pasangan_kandidat" class="@error('pasangan_kandidat') is-invalid @enderror" placeholder="Masukan Nama Pasangan" required>
            <label for="keterangan">Keterangan</label>
            <input class="form-control" type="text" id="" name="keterangan" class="@error('keterangan') is-invalid @enderror" placeholder="Masukan Keterangan" required>
            <label for="visi_kandidat">Visi Kandidat</label>
            <textarea class="textarea @error('visi_kandidat') is-invalid @enderror" rows="10" name="visi_kandidat"></textarea>
            <label for="misi_kandidat">Misi Kandidat</label>
            <textarea class="textarea @error('misi_kandidat') is-invalid @enderror" rows="10" name="misi_kandidat"></textarea>
            <label for="foto_pasangan">Foto Pasangan</label>
            <input class="form-control" type="file" id="" name="foto_pasangan" class="@error('foto_pasangan') is-invalid @enderror">
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
    </div>
    <!-- /.container-fluid -->
  </section>
  @include('sweetalert::alert')
@endsection

@section('javascript')
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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