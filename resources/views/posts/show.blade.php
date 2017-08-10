@extends('layouts.blog')
@section('content')
        <div class="containerHeaderBtn">
            <div>
                <a href="/posts" class="btn btn-default">Go Back</a>
            </div>

            <div class="containerEditDelete">
                @if(!Auth::guest())
                    {{--if the user is not a guest, they cannot see the buttons delete and edit--}}
                    @if(Auth::user()->id == $post->user_id)
                        {{--if the user is the writer of the post, they can see the buttons delete and edit--}}

                        <a href="/posts/{{$post->id}}/edit" class="btn btn-default editBtn">Edit</a>

                        {!! Form::open
                        ([
                        'action' => ['PostsController@destroy', $post->id],
                        'method' => 'POST',
                        'class' => 'btn btn-standard'
                        ])!!}
                        {{Form::hidden('_method', 'DELETE')}}

                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                        {!! Form::close()!!}
                    @endif
                @endif
            </div>
        </div>

    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
        {{--one '{' and one '!' is to parse the html from the CKEditor--}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <br>
    <small>Category: {{$post->category->name}}</small>
    <br><br>
@endsection