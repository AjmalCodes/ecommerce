@extends('layouts.frontend')

@section('title')
    Our products
@endsection
@section('content')

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Our Featured Product</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($products as $prod)
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
</section>


@endsection
