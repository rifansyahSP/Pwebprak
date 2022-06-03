@extends('layouts.client')

@section('content')
<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        {{-- <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Kopi
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Men</a></li>
                        <li><a class="text-decoration-none" href="#">Women</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Susu
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Sport</a></li>
                        <li><a class="text-decoration-none" href="#">Luxury</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Camilan
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Bag</a></li>
                        <li><a class="text-decoration-none" href="#">Sweather</a></li>
                        <li><a class="text-decoration-none" href="#">Sunglass</a></li>
                    </ul>
                </li>
            </ul>
        </div> --}}

        <div class="col-lg-12">
            {{-- <div class="row">
                <div class="col-md-12 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div> --}}
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
