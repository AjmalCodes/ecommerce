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
                    <h3 class="text-muted">Add Your Product</h3>
                </center>
            </div>
            <div class="card-body">
                <form action="/addprod" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <select
                             name="cate_id" class="form-select" id="select">
                                <option value="">Select Category</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Name:</label>
                            <input type="text" placeholder="Enter Name" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug:</label>
                            <input type="text" placeholder="Enter Slug" class="form-control" name="slug">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Seeling Price:</label>
                            <input type="text" placeholder="Enter Selling Price" class="form-control" name="selling_price">
                        </div>
                        <div class="col-md-6">
                            <label for="">Original Price:</label>
                            <input type="text" placeholder="Enter Original Price" class="form-control" name="original_price">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Status:</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular:</label>
                            <input type="checkbox" name="popular">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Meta Title:</label>
                            <input type="text" placeholder="Enter Meta Title" class="form-control"
                                name="meta_title">
                        </div>
                        <div class="col-md-6">
                            <label for="">Meta KeyWords:</label>
                            <input type="text" placeholder="Enter  Meta KeyWords" class="form-control"
                                name="meta_keywords">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Description:</label>
                            <textarea name="description" id="des" cols="10" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Choose Image:</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Product Quantity:</label>
                            <input type="text" placeholder="Enter  Product Quantity" class="form-control"
                                name="qty">
                        </div>
                    </div>
                    <br>
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info text-white">Save Data</button>
                            </div>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
@endsection
