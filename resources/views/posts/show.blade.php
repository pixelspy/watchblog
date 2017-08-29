@extends('layouts.blog')
@section('content')
        <div class="containerHeaderBtn">
            <div>
                <a href="/posts" class="btn btn-default">Go Back</a>
            </div>

            <div class="containerEditDelete ">
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{$post->title}}</h1>
            <img class="img-responsive centered" style="width:70%" src="/storage/cover_images/{{$post->cover_image}}">
            <br><br>
            <div>
                {!!$post->body!!}
                {{--one '{' and one '!' is to parse the html from the CKEditor--}}
            </div>
            <hr>
            <small>Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
            <br>
            <a href="/categories/{{$post->category->id}}"><small>Category: {{$post->category->name}}</small></a>
            <br><br>
            <hr>
        </div>
    </div>
    <div class="row col-md-8 col-md-offset-2">
        <div class="comment">
            <ul class="list-group">
        @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}: &nbsp;
                            <!-- https://laravel.com/docs/5.3/eloquent-mutators#date-mutators -->
                        </strong>
                        {{$comment->comment}}  <small>by {{$comment->name}}</small>
                    </li>
            @endforeach
            </ul>
        </div>
    </div>
    {{--comments form--}}
        @if(Auth::guest())
            <div class="row">
                <div id="comment-form" class="col-md-8 col-md-offset-2">
                    {{ Form::open(['route' => ['comments.store', $post->id, 'method' => 'POST']]) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::label('name', "Name:") }}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('email', 'Email:') }}
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                    {{ Form::label('comment', "Comment:") }}
                                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                                    {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block']) }}
                                </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            @endif
            @if(Auth::user())
                <div class="row">
                    <div id="comment-form" class="col-md-8 col-md-offset-2">
                        {{ Form::open(['route' => ['comments.store', $post->id, 'method' => 'POST']]) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::label('name', "Name:") }}
                                {{ Form::text('name', Auth::user()->name, ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('email', 'Email:') }}
                                {{ Form::text('email', Auth::user()->email, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('comment', "Comment:") }}
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                                {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            @endif

            <br><br>

@endsection
