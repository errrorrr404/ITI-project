<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an Item') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto mt-10 px-6">
        <form method="POST" action="{{ route('listings.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset class="fieldset">
                <legend class="fieldset-legend" for="title">What's the item name?</legend>
                <input type="text" class="input @error('title') input-error @enderror" placeholder="Type here" id="title" name="title" required value="{{ old('title') }}" />
                <p class="label">Required</p>
            </fieldset>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Item description</legend>
              <textarea class="textarea h-24 @error('description') textarea-error @enderror" placeholder="describe the item" id="description" name="description" required value="{{ old('description') }}"></textarea>
              <p class="label">Required</p>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend" for="price">What's the item price?</legend>
                <input type="number" class="input @error('price') input-error @enderror" placeholder="Type here" id="price" name="price" value="{{ old('price') }}" required />
                <p class="label">Required</p>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend" for="category">What's the category?</legend>
                <input type="text" class="input @error('category') input-error @enderror" required placeholder="eg. Electronics" id="category" name="category" value="{{ old('category') }}" />
                <p class="label">Required</p>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend" for="condition">What's the item condition?</legend>
                <select class="select @error('condition') select-error @enderror" id="condition" name="condition" required value="{{ old('condition') }}">
                    <option disabled selected>Item's condition</option>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
                <p class="label">Required</p>
            </fieldset>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Enter you're phone number</legend>
              <input type="text" class="input @error('seller_phone') input-error @enderror" placeholder="eg. 01xxxxxxxxx" id="phone" name="seller_phone" required value="{{ old('seller_phone') }}" />
              <p class="label">Required</p>
            </fieldset>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">upload an image</legend>
              <input type="file" class="file-input" id="image" name="image" value="{{ old('image') }}" />
              <label class="label">Max size 2MB</label>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
