@extends('layouts.frontend')

@section('title')
    Welcome to raw & rare
@endsection

@section('content')
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header text-center">
                <h1>{{ $category->name }}</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach ($product as $prod)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="product-item">
                            <div class="product-title text-center">
                                <a href="#">{{ $prod->name }}</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>

                            <div class="product-image">
                                <a href="{{ url('view-category/' . $category->slug . '/' . $prod->slug) }}">
                                    <img src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="Product Image"
                                        class="img-fluid">
                                </a>
                                <div class="product-action">
                                    {{--  <a href="#"><i class="fa fa-cart-plus"></i></a>  --}}
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>

                            <div class="product-price text-center">
                                <h3><span>RS</span>{{ $prod->selling_price }}</h3>
                                <a class="btn btn-primary"
                                    href="{{ url('view-category/' . $category->slug . '/' . $prod->slug) }}">
                                    <i class="fa fa-shopping-cart"></i> Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
