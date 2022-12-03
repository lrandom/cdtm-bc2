<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("/dashboard", function () {
        return view("backend.layout");
    })->name('admin.dashboard');

    Route::prefix("user")->group(function () {
        Route::get('/add',
            [\App\Http\Controllers\Admin\UserController::class,
                'add'])->name('admin.user.add');
        Route::post('/add',
            [\App\Http\Controllers\Admin\UserController::class, 'doAdd'])
            ->name('admin.user.do-add');
        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\UserController::class,
            'delete'])->name('admin.user.delete');
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'list'])
            ->name('admin.user.list');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])
            ->name('admin.user.edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'doEdit'])
            ->name('admin.user.do-edit');
    });

});
