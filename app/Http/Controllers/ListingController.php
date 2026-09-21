<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listings = Listing::with("user")->latest()->get();
        return view("listings.index", compact("listings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("listings.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validates the requests and stores it before handing it to the create()
        $validated = $request->validate([
            "title" => "required",
            "description" => ["required", "min:10"],
            "price" => "required|numeric",
            "category" => "required",
            "condition" => "required",
            "seller_phone" => "required",
            "image" => "nullable|image|max:2048",
        ]);
        if ($request->hasFile("image")) {
            $validated["image"] = $request
                ->file("image")
                ->store("listings", "public");
        }
        $request->user()->listings()->create($validated);

        return redirect("/listings");
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        //
        return view("listings.show", compact("listing"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        //
        $this->authorize("update", $listing);

        return view("listings.edit", compact("listing"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        //
        $this->authorize("update", $listing);

        $listing->update([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
        ]);
        return redirect("listings/{$listing->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
        $this->authorize("delete", $listing);
        if ($listing->image) {
            Storage::disk("public")->delete($listing->image);
        }

        $listing->delete();
        return redirect("/listings");
    }
}
