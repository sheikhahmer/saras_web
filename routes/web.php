<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-detail', [HomeController::class, 'detail'])->name('product-detail');
Route::get('/about-us', [AboutUsController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [ContactUsController::class, 'contactUs'])->name('contactUs');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
