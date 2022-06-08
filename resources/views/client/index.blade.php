@extends('layouts.client')

@section('content')
<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <h1 class="mb-4">
            <i class="fa-solid fa-mug-saucer"></i>
            Menu</h1>
        <hr>
        <div class="col-lg-12">
            <div class="row">
                @forelse ($menus as $menu)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0" src="{{ asset($menu->image) }}" style="height: 350px; object-fit: cover">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-dark text-white mt-2" href="{{ route('detail', $menu->id) }}"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-dark text-white mt-2" href="{{ route('client.cart.store', $menu->id) }}?quantity=1"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('detail', $menu->id) }}" class="h3 text-decoration-none">{{$menu->name}}</a>
                                <p class="text-center mb-0">Rp {{$menu->price_formatted}}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            <p class="text-center">Tidak ada menu</p>
                        </div>
                    </div>
                @endforelse

            </div>
            {{-- <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link bg-dark text-light rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                    </li>
                </ul>
            </div> --}}
        </div>

    </div>
</div>
<!-- End Content -->
@endsection
