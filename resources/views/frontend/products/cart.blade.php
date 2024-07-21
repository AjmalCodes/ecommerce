@extends('layouts.frontend')
@section('title')
    Cart Items
@endsection
@section('content')
    <section class="shoping-cart spad">
        <div class="container">
            <form action="{{ url('checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="shoping__product">Product Image</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach ($cart as $item)
                                        @php
                                            $subtotal += $item->products->selling_price;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="selected_items[]" value="{{ $item->id }}"></td>
                                            <td class="shoping__cart__item">
                                                <a href="{{ route('product.detail', ['id' => $item->products->id]) }}">
                                                    <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}" alt="Image" width="200px">
                                                    <h5>{{ $item->products->name }}</h5>
                                                </a>
                                            </td>
                                            <td class="shoping__cart__price">
                                                RS {{ $item->products->selling_price }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="/removecart/{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ '/' }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>RS {{ $subtotal }}</span></li>
                                <li>Total <span>RS {{ $subtotal }}</span></li>
                            </ul>
                            <button type="submit" class="primary-btn checkout-btn">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
