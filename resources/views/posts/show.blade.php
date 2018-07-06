@extends('layouts.blog')

@section('content')
  <div class="containerHeaderBtn">
        <div>
            <a href="/" class="btn btn-default">Go Back</a>
        </div>
    </div>
        <br>
        <br>
    <div class="row">
        <div class="col-md-10">
            <div >
                @if ( isset($post->user->id) && isset($post->user->name) && isset($post->user->avatar) )
                    <a class="flex_align_side" href="/users/{{$post->user->id}}">
                        <div class="">
                            <img
                                src="/uploads/avatars/{{$post->user->avatar}}" alt="Your Avatar Picture"
                                class="roundAvatar">
                        </div>

                        <p>{{$post->user->name}}</p>
                    </a>
                @endif
            </div>

            <div class="flex_box_space_between">
                <h1>{{$post->title}}</h1>
                <div class="containerEditDelete ">
                    @if(!Auth::guest())
                        {{--if the user is not a guest, they cannot see the buttons delete and edit--}}
                        @if(Auth::user()->id == $post->user_id)
                            {{--if the user is the writer of the post, they can see the buttons delete and edit--}}

                            <a href="/posts/{{$post->id}}/edit">
                                <img class="iconSmall" src="/img/pencil.png" alt="editing pencil">
                            </a>

                            {!! Form::open
                            ([
                            'action' => ['PostsController@destroy', $post->id],
                            'method' => 'POST',
                            'class' => ''
                            ])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::button(
                                '<img class="iconSmall" src="/img/bin.png" alt="deleting bin">',
                                ['type' => 'submit', 'class' => 'btnNoCss'] )
                            }}
                            {!! Form::close()!!}
                        @endif
                    @endif
                </div>
            </div>

            @if (isset($post->created_at) && isset($post->category->id) && isset($post->category->name))
                <p>Written on {{$post->created_at}} | <a href="/categories/{{$post->category->id}}" class="categoryText">{{$post->category->name}}</a></p>
            @endif
            <img class="img-responsive centered imgLarge" src="/storage/cover_images/{{$post->cover_image}}">
            <br><br>
            <div class="post_text">
                {!!$post->body!!}
                {{--one '{' and one '!' is to parse the html from the CKEditor--}}
            </div>
            <hr>
            {{-- @if (isset($post->created_at) && isset($post->user->id) && isset($post->user->name) && isset($post->category->id) && isset($post->category->name))
                <small>Written on {{$post->created_at}} by <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small>
                <br>
                <a href="/categories/{{$post->category->id}}"><small>Category: {{$post->category->name}}</small></a>
                <br><br>
                <hr>
            @endif --}}
        </div>
    </div>
    <div class="row col-md-10">
        <div class="comment">
            <ul class="list-group">
        @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}: &nbsp;
                        </strong>
                        {{$comment->comment}}  <small>by {{$comment->name}}</small>
                    </li>
            @endforeach
            </ul>
        </div>
    </div>

    @include('include.comment')

    <br><br>
@endsection
