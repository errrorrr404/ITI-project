<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::redirect("/", "/listings");
//show the index page
Route::get("/listings", [ListingController::class, "index"]);

Route::middleware("auth")->group(function () {
    //shows the create page
    Route::get("/listings/create", [ListingController::class, "create"]);
    //store the new item
    Route::post("/listings", [ListingController::class, "store"])->name(
        "listings.store",
    );
    //shows the edit page
    Route::get("/listings/{listing}/edit", [ListingController::class, "edit"]);
    // updates an item
    Route::patch("/listings/{listing}", [
        ListingController::class,
        "update",
    ])->name("listings.update");
    // deletes an item
    Route::delete("/listings/{listing}", [ListingController::class, "destroy"]);
});

//show indivvidual items -delayed cause i don't want the router to treat create\edit as individual listings or as an id
Route::get("/listings/{listing}", [ListingController::class, "show"]);

//shows the dashboard
Route::get("/dashboard", function (Request $request) {
    return view("dashboard", ["listings" => $request->user()->listings]);
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::post("/logout", function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect("/listings");
})->name("logout");

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
