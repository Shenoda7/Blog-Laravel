<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(User $author)
    {
        return view('posts', [
            'posts' => $author->posts,
            'currentAuthor' => $author
        ]);
    }
}
