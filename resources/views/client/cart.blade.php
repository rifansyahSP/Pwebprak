@extends('layouts.client')

@section('content')
<div class="container py-5">
    <div class="row">
        <h1 class="mb-4">
            <i class="fa-solid fa-cart-shopping"></i>
            Cart</h1>
        <hr>
    {{-- show error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <ol>
        @forelse ($carts as $cart)
            <li class="d-flex flex-row">
                <div class="col-4 text-center">
                    <img class="img-fluid" src="{{asset($cart->menu->image)}}" style="height: 250px">
                </div>
                <div class="col-auto">
                    <p class="fw-bold">Nama: {{ $cart->menu->name }}</p>
                    <p>Qty: {{ $cart->quantity }}</p>
                    <p>Sub Harga: Rp {{ $cart->total_price_formatted }}</p>
                    <a class="btn btn-danger" href="{{route('client.cart.delete', $cart->id)}}">Hapus</a>
                </div>
            </li>
            <hr>
        @empty
            <p>Keranjang Kosong</p>
        @endforelse
    </ol>
    @if ($carts->count() > 0)
        <h4 class="mb-4 text-end">Total Harga: Rp {{ $total_price_formatted }}</h4>
        <hr>
        <form action="{{route('client.order.checkout')}}" method="POST">
            @csrf
            <div class="form-group d-flex flex-row align-items-center">
                <p class="m-0 me-2">Nomor Meja :</p>
                <input class="form-control col me-2" type="number" name="table_number" id="table_number" min="1" max="99">
                <button type="submit" class="col-2 btn btn-primary">Checkout</button>
            </div>
        </form>
    @endif
    </div>
</div>
@endsection
