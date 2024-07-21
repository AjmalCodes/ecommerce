@extends('layouts.frontend')

@section('title')
Searched item
@endsection


@section('content')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="call-to-action">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <h1>Your Searched Products</h1>
                        </div>

                    </div>
                </div>
            </div>




            @foreach ($products as $item)

            <div class="search-item">
                <a href="detail/{{ $item->id }}">
                <img src="{{ asset('assets/uploads/product/'.$item->image) }}" alt="">
                <div>
                    <h3>{{ $item->name }}</h3>
                    <h3>{{ $item->description }}</h3>
                </div>
                </a>
            </div>
            @endforeach


        </div>
    </div>
</div>

@endsection
