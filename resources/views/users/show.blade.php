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
    <div class="containerPosts">
        <div class="row1">
            @foreach($user->posts as $post)
                <div class="item well">
                    <a href="/posts/{{$post->id}}">
                        <h3>{{$post->title}}</h3>
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <br><br>
@endsection