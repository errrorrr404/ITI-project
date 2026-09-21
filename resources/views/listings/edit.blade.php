<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit this Item') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto mt-10 px-6">
        <form method="POST" action="{{ route('listings.update', $listing) }}">
            @method("PATCH")
            @csrf
            <fieldset class="fieldset">
                <legend class="fieldset-legend" for="title">What's the item name?</legend>
                <input type="text" class="input" placeholder="Type here" id="title" name="title" required value="{{ old('title', $listing->title) }}" />
                <p class="label">Required</p>
            </fieldset>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Item description</legend>
              <textarea class="textarea h-24" placeholder="describe the item" id="description" name="description" required>{{ old('description', $listing->description) }}</textarea>
              <div class="label">Required</div>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend" for="price">What's the item price?</legend>
                <input type="number" class="input" placeholder="Type here" id="price" name="price" value="{{ old('price', $listing->price) }}" required />
                <p class="label">Required</p>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
