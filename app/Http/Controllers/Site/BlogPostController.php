<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index($id = null)
    {
        $post = Post::all()->where('id', $id)->first();

        return view('blogpost', [
            'post' => $post
        ]);
    }
}
