<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listings') }}
        </h2>
    </x-slot>
<div class="container text-black mx-auto">
    <div class="row">
        <div class="col-md-12">
            <ul class="mt-6 flex flex-col gap-x-6 gap-y-4 mx-auto">
            @foreach ($listings as $listing)
            <li>
            <a href="/listings/{{ $listing->id }}" class="card card-border bg-base-100 w-96 shadow-sm">
              <figure>
                <img
                    class="p-4"
                    src="{{ asset('storage/' . $listing->image) }}"
                    alt="{{ $listing->title }}"
                />
              </figure>
              <div class="card-body">
                <h2 class="card-title">
                  {{ $listing->title }}
                </h2>
                <p>{{ $listing->description }}</p>
                <p class="text-sm opacity-60">
                    Posted by {{ $listing->user->name }} {{ $listing->created_at->diffForHumans() }}
                </p>
                <div class="card-actions justify-end mt-2">
                  <div class="badge badge-outline">{{ $listing->category }}</div>
                </div>
              </div>
            </a>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
</x-app-layout>
