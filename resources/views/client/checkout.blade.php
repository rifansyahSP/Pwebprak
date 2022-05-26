<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Order</title>
</head>
<body>
    <h1>Order</h1>
    <p>Status: {{$order->status}}</p>
    <p>Table Number: {{$order->table_number}}</p>
    <p>Total Harga: Rp {{$order->total_price_formatted}}</p>
    <p>Tanggal Order: {{$order->created_at}}</p>
    @foreach ($order->carts as $cart)
        <ol>
            <li>
                <img src="{{asset($cart->menu->image)}}" width="200">
                <p>Nama: {{ $cart->menu->name }}</p>
                <p>Qty: {{ $cart->quantity }}</p>
                <p>Sub Harga: Rp {{ $cart->total_price_formatted }}</p>
            </li>
            </li>
        </ol>
    @endforeach
</body>
</html>