<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// user controller start here

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])
    ->name('dashboard');

// user controller end here 


// admin controller start here

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/addcategory', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/postaddcategory', [AdminController::class, 'postaddcategory'])->name('admin.postaddcategory');
});

Route::get('/viewcategory', [AdminController::class, 'viewcategory'])->middleware(['auth', 'verified'])
    ->name('admin.viewcategory');

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'verified'])
    ->name('admin.delete_category');

Route::get('/update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth' , 'verified'])
    ->name('admin.update_category');

Route::post('/save_category/{id}', [AdminController::class, 'save_category'])->middleware(['auth' , 'verified'])
    ->name('admin.save_category');

Route::get('/add_supplier' , [AdminController::class, 'add_supplier']) ->middleware(['auth' , 'verified'])
    ->name('admin.add_supplier');

Route::post('/supplier_save' , [AdminController::class, 'supplier_save']) ->name('admin.supplier_save');

Route::get('/view_supplier' ,[AdminController::class, 'view_supplier'])->middleware(['auth', 'verified'])
    ->name('admin.view_supplier');

Route::get('/delete_supplier/{id}' , [AdminController::class, 'delete_supplier'])->name('admin.delete_supplier');

Route::get('/update_supplier/{id}', [AdminController::class, 'update_supplier'])->name('admin.update_supplier');

Route::post('/supplier_new_value/{id}', [AdminController::class, 'supplier_new_value'])->name('admin.supplier_new_value');


// admin controller end here 


// profile controller start here 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// profile controller end here 
