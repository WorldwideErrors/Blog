@extends('layouts.app')

@section('content')
    <div class="container-fluid justify-content-left">
        <div class="row justify-content-left">
            <div class="col-md-8 post-single">
                <div class="SinglePostIt p-3">
                    <h3 class="title">{{$post->title}}</h3>
                    {!! $post->content !!}
                    <span class="publishdatum"> Gepubliceerd op {{$post->published_at ?? "--" }}</span>
                    @auth()
                        <div class="postbutton">
                            @if(!$post->published_at && Auth::user()->can('publish',$post))
                            <button class="btn btn-success" id="Publishbutton" onclick="event.preventDefault(); document.getElementById('publish-post-form').submit();">
                            Publish
                            </button>
                            <form id="publish-post-form" action="/posts/{{$post->id}}/publish" method="POST" style="display:none;">
                            @csrf;
                            </form>
                            @endif
                            @can('update',$post)
                            <a href="/posts/{{$post->id}}/edit" id="btn-edit" class="btn btn-primary">
                                Edit
                            </a>
                            @endcan
                        </div>
                    @endauth
                </div>
            </div>
            <div class="col md-4 picture-wall">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container-fluid justify-content-left ">
            <div class="row justify-content-left ">
                <div class="col-md-6 post-single ">
                    <div class="reactions">
                        <br/>
                        <h3 class="comment-list">COMMENTS</h3>
                        <hr/>
                        @foreach($post->reactions as $reaction)
                        <div class="reaction">
                            <div class="row">
                                <div class="col-sm-2 mr-4">
                                    <img src="../../images/boy.png" alt="Your Profile Image" class="profiel-plaatje rounded-circle">
                                </div>
                                <div class="col-sm-9">
                                    <span class="username">{{$reaction->author->name}}</span> <span class="reactioncreated"> &equiv; {{$reaction->created_at->format('D, d M Y  H:m')}} </span><br/>
                                    <span class="comment-tekst">{{$reaction->content}}</span><br/>
                                    <div class="reaction-buttons">
                                        @if($reaction->user_id == Auth::id())
                                        <div class="single_comment_buttons" id="single_comments_{{$reaction->id}}">
                                            <button id="butt_comment_edit" data-id="{{$reaction->id}}" class="btn btn-primary" onclick="event.preventDefault();
                                            document.getElementById('single_comments_{{$reaction->id}}').style.float = 'none';
                                            document.getElementById('form_comment_edit_{{$reaction->id}}').style.display = 'block'">
                                            Edit
                                            </button>
                                            <form action="/reaction/{{$reaction->id}}" method="post" id="form_comment_edit_{{$reaction->id}}" style="display: none;">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="txtContent"></label>
                                                <textarea class="form-control" name="txtEditContent" id="txtEditContent" rows="5"> {{$reaction->content}}</textarea>
                                            </div>
                                            <button type="submit" id="saveedit" class="btn btn-primary">
                                            Save
                                            </button>
                                                @endif
                                                @can('delete',$reaction)
                                            </form>
                                            <button class="btn btn-danger" id="delrea" onclick="event.preventDefault(); document.getElementById('delete-reaction-form').submit();">
                                            Delete
                                            </button>
                                            <form id="delete-reaction-form" action="/reaction/{{$reaction->id}}" method="post" style="display: none">
                                            @csrf
                                            @method('delete')
                                            </form>
                                        </div>
                                            @endcan

                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                    <div class="col-md-6 post-single ">
                        <div class="reactions">
                            @auth()
                            <br/>
                            <h3 class="reaction-title">LEAVE A REPLY</h3>
                            <hr/>
                            <form action="/posts/{{$post->id}}/reaction" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="txtReaction">Comment</label>
                                <textarea class="form-control" name="txtReaction" id="txtReaction" rows="18"></textarea>
                            </div>
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                                <br/>
                                <br/>
                                </form>
                    </div>
                </div>
            </div>
        </div>

                @else
                <br/>
                <h3 class="reaction-title">LEAVE A REPLY</h3>
                <hr/>
            <div class="alert alert-danger" role="alert">
                <strong>Log in om een reactie te plaatsen... </strong>
                <a id="btn-comment-login" class="btn btn-primary pull-right" href="/login" role="button">Login</a>
            </div>

@endauth
@endsection
