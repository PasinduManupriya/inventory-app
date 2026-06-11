<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/addcategory', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/postaddcategory', [AdminController::class, 'postaddcategory'])->name('admin.postaddcategory');
});

Route::get('/viewcategory', [AdminController::class, 'viewcategory'])->middleware(['auth', 'verified'])
    ->name('admin.viewcategory');

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'verified'])
    ->name('admin.delete_category');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
