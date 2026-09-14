@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Listings</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Condition</th>
                        <th>Seller Phone</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listings as $listing)
                    <tr>
                        <td>{{ $listing->title }}</td>
                        <td>{{ $listing->description }}</td>
                        <td>{{ $listing->price }}</td>
                        <td>{{ $listing->category }}</td>
                        <td>{{ $listing->condition }}</td>
                        <td>{{ $listing->seller_phone }}</td>
                        <td>{{ $listing->image }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
