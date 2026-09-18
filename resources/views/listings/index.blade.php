<x-app-layout>
<div class="container text-black mx-auto">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-3xl text-center">Listings</h1>
            <ul class="mt-6 flex flex-col gap-x-6 gap-y-4 mx-auto">
            @foreach ($listings as $listing)
            <li>
            <a href="/listings/{{ $listing->id }}" class="card card-border bg-base-100 w-96 shadow-sm">
              <figure>
                <img
                    class="p-4"
                    src="{{ $listing->image }}"
                    alt="{{ $listing->title }}"
                />
              </figure>
              <div class="card-body">
                <h2 class="card-title">
                  {{ $listing->title }}
                  <!--<div class="badge badge-secondary">NEW</div>-->
                </h2>
                <p>{{ $listing->description }}</p>
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
