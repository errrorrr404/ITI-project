<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;

//show the index page
Route::get("/listings", [ListingController::class, "index"]);

//store the new item
Route::post("/listings", [ListingController::class, "store"]);

//show indivvidual items
Route::get("/listings/{listing}", [ListingController::class, "show"]);

//shows the create page
Route::get("/listings/create", [ListingController::class, "create"]);

//shows the edit page
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"]);

//shows the dashboard
Route::get("/dashboard", function () {
    return view("dashboard");
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
