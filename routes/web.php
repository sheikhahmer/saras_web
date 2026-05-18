<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/product/{product:slug}/inquiry-card.png', [ProductController::class, 'inquiryCard'])
    ->name('product.inquiry-card');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/about-us', [AboutUsController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [ContactUsController::class, 'contactUs'])->name('contactUs');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contactUs.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('category');
Route::get('/products-by-category/{category}', [CategoryController::class, 'getByCategory']);
