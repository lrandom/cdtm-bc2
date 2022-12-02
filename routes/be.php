<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("/dashboard", function () {
        return view("backend.layout");
    })->name('admin.dashboard');

    Route::prefix("user")->group(function () {
        Route::get('/add', function () {
            return view('backend.user.add');
        })->name('admin.user.add');
    });
});
