@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 homepage">
            <div class="card dashboard">
                <div class="card-header ">
                  <h1 class="headercard">Dashboard</h1>
                </div>
                <div class="card-body dash">
                    <div class="row">
                        <div class="col-sm-2 mr-4">
                            {{-- Profile Image --}}
                            <img src="../../images/boy.png" alt="Your Profile Image" class="profile-image rounded-circle">
                        </div>
                        <div class="col-sm-9">
                            {{-- Profile Header--}}
                            <h3 class="profile-text">
                                {{Auth::user()->name}}
                                <small class="text-muted">&equiv; {{Auth::user()->email}}</small>
                            </h3>
                            <hr/>
                            {{--Content--}}
                            Created at: {{Auth::user()->created_at}}<br/>
                            Updated at: {{Auth::user()->updated_at}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-left">
        <div class="col-md-7 post-all" >
            <h1 class="title">Persoonlijke artikelen</h1>
            <hr/>
            @foreach($posts as $post)
                @if($post->author == Auth::id())
                    <div class="SinglePostItem" style="display: block">
                        <h3 class="itemposttitle"><a class="postitem" href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
                        <p class="publishedat"><i>Gepubliceerd op {{$post->published_at ?? "?" }}</i></p><br/>
                    </div>
                @endif
            @endforeach
            <button class="btn">{{$posts->links()}}</button>
        </div>
        <div class="col-md-5 post-all">
            <iframe src="https://discordapp.com/widget?id=634528158468800512&theme=light" theme="light" allowtransparency="true" frameborder="0" class="discord"></iframe>
        </div>
    </div>
</div>
@endsection

