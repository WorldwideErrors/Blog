@extends('layouts.app')
<div class="PostSingle">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 post-single">
                <div class="card">
                    <div class="SinglePostIt">
                    <h3 class="title">{{$post->title}}</h3>
                        <hr/>
                        <h4>{{$post->content}}</h4><br/>
                        <h4>Gepubliceerd op {{$post->published_at ?? "Nog niet gepubliceerd" }}</h4><br/>
                        @auth()
                        <a href="#"class="btn btn-succes">Publish post</a>
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit Post</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
