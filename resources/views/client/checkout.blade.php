@extends('layouts.client')

@section('content')
<div class="container py-5">
    <div class="row">
        <h1 class="mb-4">
            <i class="fa-solid fa-receipt"></i>
            Receipt</h1>
        <hr>
        <p class="mb-1">Status: {{$order->status}}</p>
        <p class="mb-1">Table Number: {{$order->table_number}}</p>
        <p class="mb-1">Total Harga: Rp {{$order->total_price_formatted}}</p>
        <p>Tanggal Order: {{$order->created_at}}</p>
        <ol class="card shadow-sm p-4 pb-2">
            @foreach ($order->carts as $cart)
            <li class="d-flex flex-row">
                <div class="col-4 text-center">
                    <img class="img-fluid" src="{{asset($cart->menu->image)}}" style="height: 150px">
                </div>
                <div class="col-auto">
                    <p class="fw-bold">Nama: {{ $cart->menu->name }}</p>
                    <p>Qty: {{ $cart->quantity }}</p>
                    <p>Sub Harga: Rp {{ $cart->total_price_formatted }}</p>
                </div>
            </li>
            <hr>
            @endforeach
        </ol>
    </div>
</div>
@endsection
