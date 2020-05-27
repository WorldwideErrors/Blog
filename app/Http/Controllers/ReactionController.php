<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Reaction;
use App\Post;

class ReactionController extends Controller
{
    //public function index(){
    //    $post = Reaction::orderBy('id','desc')->paginate(1);
    // dd($posts);
    //    return view("post.index")->withPosts($post);
    //}
    //
    public function store($postid)
    {
        $post = Post::findOrFail($postid);

        $reaction = new Reaction();
        $reaction->content = request('txtReaction');
        $reaction->user_id = Auth::user()->id;
        $reaction->post_id = $post->id;
        $reaction->save();
        return redirect()->route('post.show', $post->slug);
    }

    public function destroy($reactionid)
    {

        $reaction = Reaction::findOrFail($reactionid);

        $reaction->delete();

        return redirect()->route('post.show', $reaction->post->slug);

    }

    public function edit($reactionid){
        $reaction = Reaction::findOrFail($reactionid);

        return redirect()->route('post.show', $reaction->post->slug);
    }

    public function update($reactionid){
        $reaction = Reaction::findOrFail($reactionid);

        $reaction->content = request('txtEditContent');
        $reaction->save();

        return redirect()->route('post.show', $reaction->post->slug);
    }
}
