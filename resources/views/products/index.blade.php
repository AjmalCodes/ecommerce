@extends('layouts.index')

@section('content')


<div class="card">
    <div class="card-header">
        <center>
            <h3 class="text-muted">Your Products Here</h3>
        </center>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Selling Price</th>
                <th scope="col">Original Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                <tr>

                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->selling_price }}</td>
                    <td>{{ $item->original_price }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/product/'.$item->image) }}" width="70px" height="70px" alt="Image">
                    </td>

                    <td>
                        <a href="{{ url('edit-prod/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-prod/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>

                  </tr>
                @endforeach

            </tbody>
          </table>
    </div>
</div>


@endsection
