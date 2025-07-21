<?php

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    return view('posts', [
        "posts" => Post::all()
    ]);
});

Route::get('/posts/{post}', function ($slug) {
    // Find a post by its slug and pass it to a view called "post"

    $post = Post::find($slug);
    return view('post', ['post' => $post]);

})->where('post', '[A-z_-]+');
