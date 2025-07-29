<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('home');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('category');

Route::get('/authors/{author:username}', [AuthorController::class, 'show'])->name('author');
