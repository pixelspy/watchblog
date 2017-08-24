@extends('layouts.blog')
@section('content')
    <div>
        <a href="/" class="btn btn-default">Go Back</a>
    </div>
<div class="row col-md-8 col-md-offset-2">
        <h3>Posts under <strong>{{$category->name}}</strong> category :</h3>
        <hr><br>
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
                        <small><a href="/categories/{{$post->category->id}}">Category: {{$post->category->name}}</a></small>
                    </div>
                </div>
        @endif

    @endforeach

</div>
@endsection