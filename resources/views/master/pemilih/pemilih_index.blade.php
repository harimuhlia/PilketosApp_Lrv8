@extends('tampilan.apputama')
@section('title', 'Data Pemilih')
@section('subtitle', 'Halaman Seluruh Data Pemilih')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Pemilih</h3>
              <div class="card-tools">
@if (Auth()->user()->roles == 'Administrator')
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah"><i class="fas fa-upload"></i> Import</button>
@endif
<!-- Modal -->
<div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{ route('importexcel') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <div class="form-gorup">
          <input type="file" name="file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pemilih</th>
                  <th>NIS</th>
                  <th>Level/ Kelas</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody> 
                  @foreach ($pemilih as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->kls->kode_kelas }}</td>
                    <td>{{ $item->roles }}</td>
                    <td>
                      @if( $item->status == "BELUM")
                      <span class="float-centre badge bg-danger">{{ $item->status }}</span>
                      @else
                      <span class="float-centre badge bg-success">{{ $item->status }}</span>
                      @endif
                    </td>
                    <td>
                      <a href="#" class="badge bg-primary" data-toggle="modal" data-target="#_detail-{{$item->id}}"><i class="fas fa-eye"></i></a>
                      <a href="#" class="badge bg-warning" data-toggle="modal" data-target="#_edit-{{$item->id}}"><i class="fas fa-edit"></i></a>
                      <a href="#" class="badge bg-danger" data-toggle="modal" data-target="#_hapus-{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>

                  <!-- Modal Hapus -->
                <div class="modal fade" id="_hapus-{{$item->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{ route('datapemilih.destroy', $item->id) }}">
                          @method('DELETE')
                          @csrf
                          <div class="card-body">
                            <h5>Apakah Anda Yakin Akan Mengahapus Data <strong>{{ $item->name }}</strong> ?</h5>
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
              <div class="modal fade" id="_edit-{{ $item->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Kelas</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('datapemilih.update', $item->id )}}">
                        @method("PUT")
                        @csrf
                        <div class="card-body">
                          <label for="kodeEkskul">Nama Pemilih</label>
                          <input class="form-control" type="text" id="" name="name" value="{{ old('name', $item->name)}}" class="@error('name') is-invalid @enderror" placeholder="Masukan Nama Pemilih">
                          <label for="email">Email</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $item->email)}}" placeholder="Alamat Email" autofocus>
                          <label for="namaEkskul">NIS Sekolah</label>
                          <input class="form-control" type="text" id="" name="nis" value="{{ old('nis', $item->nis)}}" class="@error('nis') is-invalid @enderror" placeholder="Masukan NIS Sekolah">
                          <label for="kodeEkskul">Kelas Pemilih</label>
                          <select class="form-control" id="" name="kelas" class="@error('kelas') is-invalid @enderror">
                          @foreach ($kelaspemilih as $kelas)
                          <option value="{{ $kelas->id }}" {{ $kelas->id == $item->kelas ? "selected" : ""}}>{{ $kelas->kode_kelas }}</option>
                          @endforeach
                          </select>
                          <label for="position-option">Role Pemilih</label>
                          <select class="form-control" id="roles" name="roles">
                            <option value="Administrator"{{ $item->roles == "Administrator" ? 'selected' : "" }}>Administrator</option>
                            <option value="Pemilih"{{ $item->roles == "Pemilih" ? 'selected' : "" }}>Pemilih</option>
                          </select>
                          <label for="namaEkskul">Status Pemilih</label>
                          <select class="form-control" id="status" disabled name="status">
                            <option value="BELUM"{{ $item->status == "BELUM" ? 'selected' : "" }}>BELUM</option>
                            <option value="SUDAH"{{ $item->status == "SUDAH" ? 'selected' : "" }}>SUDAH</option>
                          </select>
                          <label for="password">Password</label>
                          <input id="password" type="password" class="form-control" name="password" class="@error('password') is-invalid @enderror" placeholder="Password">
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
                <div class="modal fade" id="_detail-{{ $item->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Data Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{route('datapemilih.show', $item->id)}}">
                          @method("GET")
                          @csrf
                          <div class="card-body">
                            <dl class="row">
                              <dt class="col-sm-4">Nama Pemilih  :</dt>
                              <dd class="col-sm-8">{{$item->name}}</dd>
                              <dt class="col-sm-4">NIS Pemilih  :</dt>
                              <dd class="col-sm-8">{{$item->nis}}</dd>
                              <dt class="col-sm-4">Kelas Pemilih  :</dt>
                              <dd class="col-sm-8">{{$item->kls->kode_kelas}}</dd>
                              <dt class="col-sm-4">Status Pemilih  :</dt>
                              <dd class="col-sm-8">
                                @if( $item->status == "BELUM")
                                <span class="float-centre badge bg-danger">{{ $item->status }} MEMILIH</span>
                                @else
                                <span class="float-centre badge bg-success">{{ $item->status }} MEMILIH</span>
                                @endif
                              </dd>
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
                  <th>#</th>
                  <th>Nama Pemilih</th>
                  <th>NIS</th>
                  <th>Level/ Kelas</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Edit</th>
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
    </div>
    <!-- /.container-fluid -->
    
    <!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Pemilih Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            <select class="form-control" id="status" disabled name="status">
              <option value="BELUM">BELUM</option>
              <option value="SUDAH">SUDAH</option>
            </select>
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" class="@error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="Password">
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