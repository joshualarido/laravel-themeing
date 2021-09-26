<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Blog extends \App\Http\Controllers\Site\Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('blog', [
            'posts' =>$posts
        ]);
    }

    public function form($id = null)
    {

    }

//    public function detail($id = null)
//    {
//        $post = Post::all()->where('id', $id)->first();
//
//        return view('blogpost', [
//            'post' => $post
//        ]);
//    }
}
