<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listings = Listing::all();
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
        //validates the requests before handing it to the create()
        $request->validate([
            "title" => "required",
            "description" => ["required", "min:10"],
            "price" => "required",
            "category" => "required",
            "condition" => "required",
            "seller_phone" => "required",
        ]);
        //stores the given data from the request into the db via the model
        Listing::create([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
            "category" => $request->category,
            "condition" => $request->condition,
            "seller_phone" => $request->seller_phone,
            "image" => $request->image,
        ]);
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
        return view("listings.edit", compact("listing"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        //
        $listing->update([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
        ]);
        return redirect("listings/{listing}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
        $listing->delete();
        return redirect("/listings");
    }
}
