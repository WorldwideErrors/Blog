@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="title">Hier komen alle posts van de blog</h1>
                    @foreach($posts as $post)
                        <h3><a class="postitem" href="/post/{{$post->slug}}">{{$post->title}}</a></h3><br/>
                        <p>CONTENT: {{$post->content}}</p><br/>
                        <p>Gepubliceerd op {{$post->published_at ?? "Nog niet gepubliceerd" }}</p><br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection