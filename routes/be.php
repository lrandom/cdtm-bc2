<?php
use Illuminate\Support\Facades\Route;
Route::prefix("admin")->group(function () {
    Route::get("/dashboard", function () {
        return view("backend.layout");
    })->name('admin.dashboard');
});
