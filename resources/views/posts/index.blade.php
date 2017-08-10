@extends('layouts.blog')

@section('content')
    <h1>Post</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <a href="/posts/{{$post->id}}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                        </div>

                        <div class="col-md-8 col-sm-8">
                            <h3>{{$post->title}}</h3>
                            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                            <hr>
                            <small>Category: {{$post->category->name}}</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts Found!</p>
    @endif
@endsection