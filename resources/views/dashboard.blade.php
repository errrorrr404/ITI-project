<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! Welcome, ") }} {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
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
                <td>
                    <a href="/listings/{{ $listing->id }}/edit" class="btn btn-primary px-3 py-2">Edit</a>
                    <form action="/listings/{{ $listing->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7"><button class="btn btn-primary"><a href="/listings/create">Create an item</a></button></td>
            </tr>
        </tbody>
    </table>
</x-app-layout>
