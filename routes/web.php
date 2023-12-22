<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {



    Route::get('/dashboard',[DashboradController::class,'index'])->name('dashboard');

   // Product
    Route::get('/add-product',[PostController::class,'addProduct'])->name('add.product');
    Route::get('/manage-product',[PostController::class,'manageProduct'])->name('manage.product');
    Route::post('/new-product',[PostController::class,'saveProduct'])->name('new.product');
    Route::get('/edit-product/{id}',[PostController::class,'productEdit'])->name('edit.product');
    Route::get('/status-product/{id}',[PostController::class,'productStatus'])->name('status.product');
    Route::post('/delete-product',[PostController::class,'productDelete'])->name('delete.product');
    Route::post('/update-product',[PostController::class,'productUpdate'])->name('update.product');

//Date-filtaring
    //Route::get('students', [PostController::class, 'index'])->name('students');
    //Route::get('/employee',[PostController::class,'index']);
    Route::get('students/records', [PostController::class, 'records'])->name('students/records');
});
