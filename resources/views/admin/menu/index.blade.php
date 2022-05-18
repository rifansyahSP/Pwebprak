@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active mr-2">Menu</li>
            <li>
              <a href="{{ route('menu.create') }}" class="btn btn-primary">Buat Menu Baru</a>
            </li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>183</td>
              <td>Kopi</td>
              <td>11000</td>
              <td>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>219</td>
              <td>Kopi Jahe</td>
              <td>12000</td>
              <td>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>657</td>
              <td>Bob Doe</td>
              <td>15000</td>
              <td>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <tr>
              <td>175</td>
              <td>Mike Doe</td>
              <td>10000</td>
              <td>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
