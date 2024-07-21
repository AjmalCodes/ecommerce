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
                    <h3 class="text-muted">Edit Your Category</h3>
                </center>
            </div>
            <div class="card-body">
                <form action="{{ url('update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name:</label>
                            <input type="text" placeholder="Enter Category Name" class="form-control" name="name" value="{{ $category->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug:</label>
                            <input type="text" placeholder="Enter Category Slug" class="form-control" name="slug" value="{{ $category->slug }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Status:</label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular:</label>
                            <input type="checkbox" name="popular" {{ $category->popular == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Meta Title:</label>
                            <input type="text" placeholder="Enter Category Meta Title" class="form-control"
                                name="meta_title" value="{{ $category->meta_title }}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Meta KeyWords:</label>
                            <input type="text" placeholder="Enter Category Meta KeyWords" class="form-control"
                                name="meta_keywords" value="{{ $category->meta_keywords }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Description:</label>
                            <textarea name="description"  id="des" cols="10" rows="3" class="form-control">{{ $category->description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Choose Image:</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset('assets/uploads/category/'.$category->image) }}" width="70px" height="70px" alt="Image">
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
