@extends('layouts.frontend')

@section('title')
    Categories
@endsection

@section('content')
    <h2> Trending Category </h2>
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Product</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach ($category as $cate)
                    <div class="col-lg-12">
                        <div class="product-item">

                            <div class="product-title">
                                <a href="#">{{ $cate->name }}</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>

                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="{{ asset('assets/uploads/category/' . $cate->image) }}" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <a href="{{ url('view-category/' . $cate->slug) }}">


                                <div class="product-price">
                                    <h3><span></span>{{ $cate->slug }}</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
