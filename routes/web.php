<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    return view('posts', [
        "posts" => Post::with(['category', 'user'])->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    // Find a post by its slug and pass it to a view called "post"
    return view('post', ['post' => $post]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});