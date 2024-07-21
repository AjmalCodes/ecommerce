@extends('layouts.index')
@section('content')
    <style>
        label {
            color: rgb(11, 44, 9);
        }
    </style>


    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3 class="text-muted">Edit Your Product</h3>
                </center>
            </div>
            <div class="card-body">
                <form action="{{ url('update-prod/'.$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name:</label>
                            <input type="text" placeholder="Enter Product Name" class="form-control" name="name" value="{{ $product->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug:</label>
                            <input type="text" placeholder="Enter Product Slug" class="form-control" name="slug" value="{{ $product->slug }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Selling Price:</label>
                            <input type="text" placeholder="Enter Selling Price" class="form-control" name="selling_price" value="{{ $product->selling_price }}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Original Price:</label>
                            <input type="text" placeholder="Enter Product Original Price" class="form-control" name="original_price" value="{{ $product->original_price }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Status:</label>
                            <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular:</label>
                            <input type="checkbox" name="popular" {{ $product->popular == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Meta Title:</label>
                            <input type="text" placeholder="Enter Product Meta Title" class="form-control"
                                name="meta_title" value="{{ $product->meta_title }}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Meta KeyWords:</label>
                            <input type="text" placeholder="Enter Product Meta KeyWords" class="form-control"
                                name="meta_keywords" value="{{ $product->meta_keywords }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Description:</label>
                            <textarea name="description"  id="des" cols="10" rows="3" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Choose Image:</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset('assets/uploads/product/'.$product->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Product Quantity:</label>
                            <input type="text" value="{{ $product->qty }}" placeholder="Enter  Product Quantity" class="form-control"
                                name="qty">
                        </div>
                    </div>
                    <br>
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info text-white">Update Data</button>
                            </div>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
@endsection
