<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;

class Blog extends Controller {

    public function index()
    {
        $posts = Post::all();

        return view('blog/index', [
            'posts' =>$posts
        ]);
    }

    public function detail($id = null)
    {
        $post = Post::all()->where('id', $id)->first();

        return view('blog/detail', [
            'post' => $post
        ]);
    }
}
