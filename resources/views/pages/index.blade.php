@extends('layouts.blog')
@section('content')
    <div class="containerIndex">
        <div class="text-center">
            <h1 id="logo_header">Watchblog</h1>
        </div>
        @include('include.categories')

        <div class="containerPosts">
            <div class="row1">

                    @if(count($posts) > 0)
                        @foreach($posts as $post)

                            <div class="item well">
                                @if(isset($post->cover_image))
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                                @endif
                                <div class="card-text">
                                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                    <small>Written on {{$post->created_at}}</small>
                                    <br>
                                    @if(isset($post->user->id) && isset($post->user->name))
                                    <small>by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
                                    <hr>
                                    @endif
                                    @if(isset($category->id))
                                    <small><a href="/categories/{{$category->id}}">Category: {{$category->name}}</a></small>
                                    @endif
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
