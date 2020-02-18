@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-9 post-all" >
                <h1 class="title">Alle blogartikelen:</h1>
                @foreach($posts as $post)
                    <div class="SinglePostItem">
                        <h3><a class="postitem" href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
                        <div class="col-md-3">
                        <i>Gepubliceerd op {{$post->published_at ?? "-" }}</i><br/>
                        </div>
                    </div>
                @endforeach
                <div class="card">


                </div>
            </div>
        </div>
    </div>
@endsection