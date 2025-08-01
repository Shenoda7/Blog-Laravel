<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->paginate(3),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
