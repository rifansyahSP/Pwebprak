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
            @forelse ($menus as $menu)
            <tr>
              <td>{{ $menu->id }}</td>
              <td>{{ $menu->name }}</td>
              <td>Rp {{ $menu->price_formatted }}</td>
              <td>
                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('menu.delete', $menu->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
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
