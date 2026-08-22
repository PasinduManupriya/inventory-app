<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [AdminController::class, 'home'])->name('home');

// user controller start here

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/about_us', [UserController::class, 'about_us']) -> name('about_us');

Route::get('/cart', [UserController::class, 'cart']) ->middleware(['auth', 'verified'])
    -> name('cart');

Route::get('/order', [UserController::class, 'order']) -> name('order');

Route::get('/user_product_details/{id}', [UserController::class, 'user_product_details']) -> name('user_product_details');

Route::post('/add_user_order/{id}', [UserController::class, 'add_user_order']) ->name('add_user_order');

// user controller end here 

Route::get('/user_search_iterm', [UserController::class, 'user_search_iterm']) ->name('user_search_iterm');


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

Route::get('/delete_supplier/{id}' , [AdminController::class, 'delete_supplier'])->middleware(['auth', 'verified'])
    ->name('admin.delete_supplier');

Route::get('/update_supplier/{id}', [AdminController::class, 'update_supplier'])->middleware(['auth', 'verified'])
    ->name('admin.update_supplier');

Route::post('/supplier_new_value/{id}', [AdminController::class, 'supplier_new_value'])->middleware(['auth', 'verified'])
    ->name('admin.supplier_new_value');

Route::get('/add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'verified'])
    ->name('admin.add_product');

Route::post('/store_product', [AdminController::class, 'store_product'])->middleware(['auth', 'verified'])
    ->name('admin.store_product');

Route::get('/view_product', [AdminController::class, 'view_product']) ->middleware(['auth' , 'verified'])
    ->name('admin.view_product');

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'verified'])
    ->name('admin.delete_product');

Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'verified'])
    ->name('admin.update_product');

Route::post('/update_save_value/{id}', [AdminController::class, 'update_save_value'])->middleware(['auth', 'verified'])
    ->name('admin.update_save_value');

Route::get('/view_product_details/{id}', [AdminController::class, 'view_product_details'])->middleware(['auth', 'verified'])
    ->name('admin.view_product_details');

Route::get('/Orders', [AdminController::class, 'Orders']) ->middleware(['auth', 'verified'])
    ->name('admin.Orders');

Route::get('/add_order/{id}', [AdminController::class, 'add_order'])->middleware(['auth', 'verified'])
    ->name('admin.add_order');

Route::post('/update_order_quantity/{id}', [AdminController::class, 'update_order_quantity'])->middleware(['auth', 'verified'])
    ->name('admin.update_order_quantity');

Route::get('delete_order/{id}', [AdminController::class, 'delete_order'])->middleware(['auth', 'verified'])
    ->name('admin.delete_order');

Route::get('/search_iterm', [AdminController::class, 'search_iterm'])->middleware(['auth', 'verified'])
    ->name('admin_search_iterm');

Route::get('/order_clear', [AdminController::class, 'clear_order'])->middleware(['auth', 'verified'])
    ->name('admin.clear_order');

// admin controller end here 


// profile controller start here 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// profile controller end here 
