@extends('layouts.blog')
@section('content')
    <div class="containerHeaderBtn">
        <div>
            <a href="/users" class="btn btn-default">Go Back</a>
        </div>
    </div>

    <h1>Posts by {{$user->name}}</h1>
    <p>User profile created on : {{$user->created_at}}</p>
    <hr>
    <br>
    <section class="row">
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <a href="/categories/{{$category->id}}"><button class="btn btn-default"><p class="col-md-4" style="font-size:15px; vertical-align: middle;">{{$category->name}}</p></button></a>
            @endforeach
        @endif
        <br><hr>
    </section>
    <div class="containerPosts">
        <div class="row1">
            @foreach($user->posts as $post)
                <div class="item well">
                    <a href="/posts/{{$post->id}}">
                        <h3>{{$post->title}}</h3>
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </a>
                    <br>
                    <small>Written on {{$post->created_at}}</small>
                    <br>
                    <small>by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
                    <hr>
                    <small><a href="/categories/{{$category->id}}">Category: {{$category->name}}</a></small>
                </div>
            @endforeach
        </div>
    </div>
    <br><br>
@endsection