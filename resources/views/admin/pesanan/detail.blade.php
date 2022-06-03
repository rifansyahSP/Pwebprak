@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="card">
            <div class="card-body">
                <h3>Pesanan {{$order->user->name}}</h3>
                <p class="mb-1">Status: {{$order->status}}</p>
                <p class="mb-1">Nomor Meja: {{$order->table_number}}</p>
                <p class="mb-1">Total Harga: Rp {{$order->total_price_formatted}}</p>
                <p class="mb-1">Tanggal Order: {{$order->created_at}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3>List Pesanan</h3>
                <ol>
                    @foreach ($order->carts as $cart)
                    <li class="d-flex flex-row">
                        <div class="col-4 text-center">
                            <img class="img-fluid" src="{{asset($cart->menu->image)}}" style="height: 150px">
                        </div>
                        <div class="col-auto">
                            <p class="fw-bold">Nama: {{ $cart->menu->name }}</p>
                            <p>Qty: {{ $cart->quantity }}</p>
                            <p>Sub Harga: Rp {{ $cart->total_price_formatted }}</p>
                            <a class="btn btn-danger" href="{{route('client.cart.delete', $cart->id)}}">Hapus</a>
                        </div>
                    </li>
                    <hr>
                    @endforeach
                </ol>
                @if ($order->status == 'pending')
                <form action="{{route('pesanan.detail', $order->id)}}" method="POST">
                    @csrf
                    <button type="submit" name="status" id="status" value="success"
                        class="btn btn-success">Selesaikan Pesanan</button>
                    <button type="submit" name="status" id="status" value="canceled"
                        class="btn btn-danger">Cancel</button>
                </form>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
