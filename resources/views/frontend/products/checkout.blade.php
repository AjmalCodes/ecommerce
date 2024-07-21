@extends('layouts.frontend')
@section('title')
    CheckOut Page
@endsection
@section('content')
    <div class="checkout">
        <div class="container-fluid">
            <form action="{{ url('place-order') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" value="{{ Auth::user()->name }}" name="fname" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control" value="{{ Auth::user()->lname }}" name="lname" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" value="{{ Auth::user()->email }}" name="email" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" value="{{ Auth::user()->phone }}" name="phone" type="text" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" value="{{ Auth::user()->address }}" name="address" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <input class="form-control" value="{{ Auth::user()->country }}" name="country" type="text" placeholder="Country">
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control" value="{{ Auth::user()->city }}" name="city" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control" value="{{ Auth::user()->state }}" name="state" type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" value="{{ Auth::user()->pincode }}" name="pincode" type="text" placeholder="ZIP Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Order Details</h1>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cartItem as $item)
                                            @php
                                                $total += $item->products->selling_price;
                                            @endphp
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>RS {{ $item->products->selling_price }}</td>
                                            </tr>
                                            <input type="hidden" name="selected_items[]" value="{{ $item->id }}">
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <p>Choose Cash on Delivery and pay only when your order arrives.</p>
                                <p>Cash on Delivery - Pay only when you receive your order.</p>
                                <hr>
                                <h5>Total: RS {{ $total }}</h5>
                                <div class="checkout-btn">
                                    <button type="submit" class="btn btn-lg" style="background-color: #7fad39; color: white">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
