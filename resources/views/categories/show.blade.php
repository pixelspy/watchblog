@extends('layouts.blog')
@section('content')
    <div>
        <a href="/" class="btn btn-default">Go Back</a>
    </div>
<div class="row col-md-8 col-md-offset-2">
        <h3>Posts under <strong>{{$category->name}}</strong> category :</h3>
        <hr><br>
    @foreach($category->post as $postsByCat)
        <div class="item well">
                    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    <div class="card-text">
                        <h3><a href="/posts/{{$post->id}}">{{$postsByCat->title}}</a></h3>
                        <small>Written on {{$postsByCat->created_at}}</small>
                        <br>
                        <small>by <a href="/users/{{$post->user->id}}">{{$postsByCat->user->name}}</a></small>
                        <hr>
                        <small><a href="/categories/{{$post->category->id}}">Category: {{$postsByCat->category->name}}</a></small>
                    </div>
                </div>
    @endforeach
</div>
@endsection
