@extends('layouts.blog')
@section('content')
    <div class="containerIndex">
        <div class=" page-header text-center">
            <h1>MeufCode</h1>
        </div>

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
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="item well">
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                                <div class="card-text">
                                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                    <small>Written on {{$post->created_at}}</small>
                                    <br>
                                    <small>by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
                                    <hr>
                                    <small><a href="/categories/{{$category->id}}">Category: {{$category->name}}</a></small>
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
