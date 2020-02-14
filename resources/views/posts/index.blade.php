@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="title">Alle blogartikelen:</h1>
                @foreach($posts as $post)
                    <div class="SinglePostItem">
                        <h3><a class="postitem" href="/post/{{$post->slug}}">{{$post->title}}</a></h3><br/>
                        <p>CONTENT: {{$post->content}}</p><br/>
                        <p>Gepubliceerd op {{$post->published_at ?? "Nog niet gepubliceerd" }}</p><br/>
                    </div>
                @endforeach
                <div class="card">


                </div>
            </div>
        </div>
    </div>
@endsection