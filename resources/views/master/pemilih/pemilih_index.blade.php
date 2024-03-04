@extends('tampilan.apputama')
@section('title', 'Data Pemilih')
@section('subtitle', 'Halaman Seluruh Data Pemilih')
    
@section('content')
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
      <a href="{{ route('datapemilih.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pemilih</th>
          <th>NIS</th>
          <th>Level/ item</th>
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
              <td>
                <div class="d-flex">
                  <a href="{{ route('datapemilih.show',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('datapemilih.edit',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('datapemilih.destroy', $item->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ms-1 show_confirm btn-sm" onclick="return confirm('Yakin akan memilih Kandidat {{ $item->name }} ?')" data-toggle="tooltip" title='Delete'><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
              </td>
          </tr>
          </div>
        @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>#</th>
          <th>Nama Pemilih</th>
          <th>NIS</th>
          <th>Level/ item</th>
          <th>Role</th>
          <th>Status</th>
          <th>Edit</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
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