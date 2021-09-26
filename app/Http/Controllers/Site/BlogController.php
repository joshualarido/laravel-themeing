<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends \App\Http\Controllers\Site\Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('blog', [
            'posts' =>$posts
        ]);
    }
}
