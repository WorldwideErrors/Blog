<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->where('published_at', '!=', null)->paginate(5);
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
        $post->author = Auth::user()->id;
        $post->save();

        return redirect('/posts');
    }

    public function edit(Post $post){

        return view('posts.edit')->withPost($post);
    }

    public function update(Post $post){

        $post->title = request('txtTitle');
        $post->slug = request('txtSlug');
        $post->content = request('txtContent');
        $post->save();

        return redirect()->route('post.show', $post->slug);
    }

    public function destroy(Post $post){

        $post->delete();

        return redirect()->route('post.index');
    }

    public function publish(Post $post){

        $post->published_at = now();
        $post->save();

        return redirect()->route('post.show', $post->slug);
    }
}
