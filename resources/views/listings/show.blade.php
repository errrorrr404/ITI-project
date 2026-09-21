<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Item:')}} {{ $listing->title }}
        </h2>
    </x-slot>
<div class="container, bg-gray text-black mx-auto">
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
                    <tr>
                        <td>{{ $listing->title }}</td>
                        <td>{{ $listing->description }}</td>
                        <td>{{ $listing->price }}</td>
                        <td>{{ $listing->category }}</td>
                        <td>{{ $listing->condition }}</td>
                        <td>{{ $listing->seller_phone }}</td>
                        <td>
                            @if ($listing->image)
                                <img src="{{ asset('storage/' . $listing->image) }}" class="w-24" alt="{{ $listing->title }}">
                            @endif
                        </td>
                        <td>
                            @can('update', $listing)
                            <a href="/listings/{{ $listing->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="/listings/{{ $listing->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>
