@extends('layouts.blog')
@section('content')
    <div class="containerIndex">
        <div class=" page-header text-center">
            <h1>A tech blog for SimplonProd team</h1>
            <br>
            <p>This is a blog created from Laravel. It is challenge for SimplonProd.</p>
            <br>
            <section class="col-md-12 row">
                <div class="col-md-6 col-md-offset-3 row">
                    <p class="col-md-6 ">Source code on
                        <a target="_blank" href="https://github.com/pixelspy/watchblog">
                            <img class="float-right imgGit" src="/img/github.png" alt="">
                        </a>
                    </p>
                    <p class="col-md-6">Get my slide on
                        <a target="_blank" href="http://slides.com/pixelspy/laravel#/">
                            <img src="/img/slides.png" alt="" class="float-right imgGit">
                        </a>
                    </p>
                </div>
            </section>
        </div>

        <section class="row">
            @foreach($posts as $post)
                <button class="btn btn-default"><a href="#"><p class="col-md-4" style="font-size:15px; vertical-align: middle;">{{$post->category->name}}</p></a></button>
                @endforeach
                <br>
                <hr>
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
                                    <small><a href="/categories/{{$post->category->id}}">Category: {{$post->category->name}}</a></small>
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
