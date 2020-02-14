@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="title">{{$post->title}}</h3>
                        <p>CONTENT: {{$post->content}}</p><br/>
                        <p>Gepubliceerd op {{$post->published_at ?? "Nog niet gepubliceerd" }}</p><br/>
                </div>
            </div>
        </div>
    </div>
@endsection