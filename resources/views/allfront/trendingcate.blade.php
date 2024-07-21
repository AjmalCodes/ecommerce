@extends('layouts.frontend')
@section('title')
Welcome To raw & rare
@endsection
@section('content')

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li><a href="#">Rings</a></li>
                        <li><a href="#">Braclets</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                {{--  <span class="arrow_carrot-down"></span>  --}}
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+92 300 7929195</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>Enhance your style with our exquisite pieces.</span>
                        <p>Luxury jewelry at your fingertips</p>
                        <h2>100% Luxury Accessories</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="{{ '/' }}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Trending categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($trending_category as $tcate)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <a href="{{ url('view-category/'.$tcate->slug ) }}">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg">
                                        <img src="{{ asset('assets/uploads/category/'.$tcate->image) }}" alt="Product Image">
                                        {{--  <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li>
                                                <form action="{{ url('addtocart') }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                                                    <button type="submit" style="border:none; background:none;">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>  --}}
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="#">{{ $tcate->name }}</a></h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            @foreach ($featured_products as $prod)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <a href="{{ route('product.detail', ['id' => $prod->id]) }}" style="all: unset; display: inline; cursor: pointer;">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg">
                                    <img src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="Product Image">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li>
                                            <form action="{{ url('addtocart') }}" method="POST" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $prod->id }}">
                                                <button type="submit" style="border:none; background:none;">
                                                    <a href=""><i class="fa fa-shopping-cart"></i></a>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6>{{ $prod->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
        </div>
    </section>
@endsection
