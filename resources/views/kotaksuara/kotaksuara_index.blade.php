@extends('tampilan.apputama')
@section('title', 'Kotak Suara')
@section('subtitle', 'Halaman Data Suara Pemilihan')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Pemilih</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pemilih</th>
                  <th>Pasangan Dipilih</th>
                  <th>Waktu Memilih</th>
                  <th>Selesai Memilih</th>
                </tr>
                </thead>
                <tbody> 
                  @foreach ($kotaksuara as $ks)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ks->nama_pemilih }}</td>
                    <td>{{ $ks->pasangan_kandidat }}</td>
                    <td>{{ $ks->created_at }}</td>
                    <td>{{ $ks->updated_at }}</td>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama Pemilih</th>
                  <th>Pasangan Dipilih</th>
                  <th>Waktu Memilih</th>
                  <th>Selesai Memilih</th>
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