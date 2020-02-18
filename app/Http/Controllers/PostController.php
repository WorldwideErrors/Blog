<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        //return ($posts);
        return view('posts.index')->withPosts($posts);
    }

    public function single($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        return view("posts.single")->withPost($post);
    }
}
