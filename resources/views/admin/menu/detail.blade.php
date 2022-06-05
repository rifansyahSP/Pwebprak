<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail {{$menu->name}}</title>
</head>
<body>
    <h1>Detail {{$menu->name}}</h1>
    <ol>
        <li>
            <strong>Nama</strong>
            <p>{{$menu->name}}</p>
        </li>
        <li>
            <strong>Harga</strong>
            <p>Rp {{$menu->price_formatted}}</p>
        </li>
        <li>
            <strong>Keterangan</strong>
            <p>{{$menu->description}}</p>
        </li>
        <li>
            <strong>Gambar</strong></br>
            <img src="{{asset($menu->image)}}" alt="{{$menu->name}}" width="200">
        </li>
    </ol>
</body>
</html>