@extends('layouts.blog')
@section('content')
    @include('include.header')
    <br><br>
    <div>
        <a href="/" class="btn btn-default">Go Back</a>
    </div>
    <h3><strong>{{$category->name}}</strong> posts :</h3>
    <br>
    <div class="containerPosts">
        <div class="row1">
            @foreach($posts as $post)
                @if($category->id == $post->category_id)
                <div class="item well">
                    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    <div class="card-text">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}}</small>
                        <br>
                        <small>by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
                        <hr>
                        <small><a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a></small>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
