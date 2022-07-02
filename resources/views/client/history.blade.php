@extends('layouts.client')

@section('content')
<div class="container py-5">
    <div class="row">
        <h1 class="mb-4">
            <i class="fa-solid fa-history"></i>
            Riwayat
        </h1>
            @foreach ($orders as $order)
                <hr>
                <p class="mb-1">Tanggal Order: {{Carbon\Carbon::parse($order->created_at)->format('d F Y, H:i')}}</p>
                <p class="mb-1">Table Number: {{$order->table_number}}</p>
                <p class="mb-1">Total Harga: Rp {{$order->total_price_formatted}}</p>
                <p class="mb-1">Status: {{ucfirst($order->status)}}</p>
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
            @endforeach
    </div>
</div>
@endsection
