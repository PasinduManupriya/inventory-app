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

Route::get('/add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'verified'])
    ->name('admin.add_product');

Route::post('store_product', [AdminController::class, 'store_product'])->name('admin.store_product');

Route::get('/view_product', [AdminController::class, 'view_product'])->name('admin.view_product');

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('admin.delete_product');

Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('admin.update_product');

Route::post('/update_save_value/{id}', [AdminController::class, 'update_save_value'])->name('admin.update_save_value');

Route::get('/Orders', [AdminController::class, 'Orders']) ->name('admin.Orders');

Route::get('/add_order/{id}', [AdminController::class, 'add_order'])->name('admin.add_order');

Route::post('/update_order_quantity/{id}', [AdminController::class, 'update_order_quantity'])->name('admin.update_order_quantity');

Route::get('delete_order/{id}', [AdminController::class, 'delete_order'])->name('admin.delete_order');

// admin controller end here 


// profile controller start here 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// profile controller end here 
