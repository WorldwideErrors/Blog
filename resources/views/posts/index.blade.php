@extends('layouts.app')

@section('content')
    <div class="container-fluid justify-content-left">

        <div class="row justify-content-left">
            <div class="col-md-8 post-all" >
                <h1 class="title">Alle blogartikelen:</h1>
                <hr/>
                @foreach($posts as $post)
                    @if($post->published_at)
                    <div class="SinglePostItem" style="display: block">
                        <h3 class="itemposttitle"><a class="postitem" href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
                        <p class="publishedat"><i>Gepubliceerd op {{$post->published_at}}</i></p><br/>
                    </div>
                    @endif
                @endforeach
                <button class="btn">{{$posts->links()}}</button>
            </div>
            <div class="col md-4 picture-wall">

            </div>
        </div>
    </div>
@endsection
