@extends('layouts.blog')

@section('content')
    <h1>All Posts</h1>
    <hr>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <a href="/posts/{{$post->id}}">
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </a>
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <a href="/posts/{{$post->id}}">
                                <h3>{{$post->title}}</h3>
                            </a>

                            <small>Written on {{$post->created_at}}</small>
                            <small>by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
                            <hr>
                            <a href="/categories/{{$post->category->id}}"><small>Category: {{$post->category->name}}</small></a>
                        </div>
                    </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts Found!</p>
    @endif
@endsection