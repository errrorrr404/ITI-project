<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;

Route::get("/", function () {
    return view("auth.welcome");
});

Route::get("/register", [AuthController::class, "create"]);

Route::post("/register", [AuthController::class, "store"]);

// Route::middleware(["auth"])->group(function () {
//     Route::get("/dashboard", function () {
//         return view("dashboard");
//     });
// });
