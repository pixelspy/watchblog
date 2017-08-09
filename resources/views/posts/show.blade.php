@extends('layouts.blog')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
        {{--one '{' and one '!' is to parse the html from the CKEditor--}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        {{--if the user is not a guest, they can see the buttons delete and edit--}}
        @if(Auth::user()->id == $post->user_id)
            {{--if the user is the writer of the post, they can see the buttons delete and edit--}}

            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

                {!! Form::open
                ([
                'action' => ['PostsController@destroy', $post->id],
                'method' => 'POST',
                'class' => 'pull-right'
                ])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                {!! Form::close()!!}
        @endif
    @endif

@endsection