@extends('layouts.client')

@section('content')
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{ asset($menu->image) }}" alt="Card image cap" id="product-detail">
                </div>
                {{--
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset('assets/img/expresso.jpg') }}" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset('assets/img/expresso.jpg') }}" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset('assets/img/expresso.jpg') }}" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div> --}}
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{$menu->name}}</h1>
                        <p class="h3 py-2">RP {{$menu->price_formatted}}</p>

                        <h6>Description:</h6>
                        <p>{{$menu->description}}</p>

                        <form action="{{route('client.cart.store', $menu->id)}}" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="quantity" id="quantity" value="1" min="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-dark" id="btn-minus" onclick="
                                            if (document.getElementById('quantity').value > 1) {
                                                document.getElementById('quantity').value--;
                                            }
                                            ">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-dark" id="btn-plus" onclick="document.getElementById('quantity').value++">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->
@endsection

@section('script')
<!-- Start Slider Script -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
</script>
<!-- End Slider Script -->
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}">
@endsection
