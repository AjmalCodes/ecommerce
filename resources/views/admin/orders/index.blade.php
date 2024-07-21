@extends('layouts.index')
@section('content')
    <div class="card">
        <div class="card-header">
            <center>
                <h3 class="text-muted">Your Orders Here</h3>
            </center>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>

                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
