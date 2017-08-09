@extends('layouts.blog')
@section('content')
    <div class="containerIndex">
        <div class=" page-header text-center">
            <h1>Welcome to the Watch Blog</h1>
            <p>This is a blog created from Laravel. It is challenge from SimplonProd.</p>
            <p><a target="_blank" href="https://github.com/pixelspy/watchblog">Here is the Github Page for this project</a></p>
            <p><a target="_blank" href="http://slides.com/pixelspy/laravel#/">The slide I made for this project</a></p>
        </div>

        <div class="containerPosts">
            <div class="row1">
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="item well">
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                                <div class="card-text">
                                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                                </div>
                            </div>
                        @endforeach
                        {{$posts->links()}}
                    @else
                        <p>No Posts Found!</p>
                    @endif
            </div>
        </div>
    </div>

@endsection
