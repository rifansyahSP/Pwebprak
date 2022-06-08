@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active mr-2">Pesanan</li>
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
              <th>Tanggal</th>
              <th>Nama Pembeli</th>
              <th>Meja</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->table_number }}</td>
                <td>Rp. {{ $order->total_price_formatted }}</td>
                <td>
                  @if ($order->status == 'pending')
                  <span class="badge badge-warning">Pending</span>
                  @elseif ($order->status == 'success')
                  <span class="badge badge-success">Success</span>
                  @elseif ($order->status == 'canceled')
                  <span class="badge badge-danger">Cancel</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('pesanan.detail', $order->id) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-eye"></i>
                    Detail</a>
                </td>
              </tr>
            @endforeach
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


