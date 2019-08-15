<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function single(Post $post)
    {
        return view('/user/singlepost', compact('post'));
    }

    public function all()
    {
        return view('/user/allpost', [
            'posts' => Post::latest()->paginate(5)
        ]);
    }
}
