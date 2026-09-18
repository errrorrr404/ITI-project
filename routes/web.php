<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;

//show the index page
Route::get("/listings", [ListingController::class, "index"]);

//shows the create page
Route::get("/listings/create", [ListingController::class, "create"]);

//store the new item
Route::post("/listings", [ListingController::class, "store"]);

//shows the edit page
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"]);

//show indivvidual items
Route::get("/listings/{listing}", [ListingController::class, "show"]);

// updates an item
Route::patch("/listings/{listing}", [ListingController::class, "update"]);

// deletes an item
Route::delete("/listings/{listing}", [ListingController::class, "destroy"]);

//shows the dashboard
Route::get("/dashboard", function () {
    $listings = Listing::all();
    return view("dashboard", ["listings" => $listings]);
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit",
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update",
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy",
    );
});

require __DIR__ . "/auth.php";
