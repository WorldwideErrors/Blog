<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        // dd($posts);
        return view("posts.index")->withPosts($posts);
    }

    public function show($slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        // dd($post);
        return view("posts.single")->withPost($post);
    }

    public function create(){
        return view("posts.create");
    }

    public function store(){
        // dd(request()->all());
        //dd(request('txtTitle'));
        $post = new Post();
        $post->title = request('txtTitle');
        $post->slug = request('txtSlug');
        $post->content = request('txtContent');
        $post->author = 1;
        $post->save();

        return redirect('/posts');
    }

    public function edit($id){
        $post = Post::findOrFail($id);

        return view('posts.edit')->withPost($post);
    }

    public function update($id){
        $post = Post::findOrFail($id);

        $post->title = request('txtTitle');
        $post->slug = request('txtSlug');
        $post->content = request('txtContent');
        $post->save();

        return view('posts.single')->withPost($post);
    }
}
