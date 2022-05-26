<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Client</title>
</head>
<body>
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
            <li>
                <img src="{{asset($cart->menu->image)}}" width="200">
                <p>Nama: {{ $cart->menu->name }}</p>
                <p>Qty: {{ $cart->quantity }}</p>
                <p>Sub Harga: Rp {{ $cart->total_price_formatted }}</p>
                <a href="{{route('client.cart.delete', $cart->id)}}">Hapus</a>
            </li>
        @empty
            <p>Keranjang Kosong</p>
        @endforelse
    </ol> 
    @if ($carts->count() > 0)
        <p>Total Harga: Rp {{ $total_price_formatted }}</p>
        <hr>
        <form action="{{route('client.order.checkout')}}" method="POST">
            @csrf
            <input type="number" name="table_number" id="table_number" min="1" max="12" placeholder="table number" width="200"></br>
            <button type="submit">Checkout</button>
        </form>
    @endif       
</body>
</html>