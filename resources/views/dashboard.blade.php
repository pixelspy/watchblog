@extends('layouts.blog')

@section('content')
<div class="container">
    <div class="">
        <h3>Dashboard</h3>
        <div class="panel-body row">
            <a href="/posts/create" class="btn btn-primary"><h4>Create Post</h4></a>
            <br>
            <br>
            <br>
            <h3>Your blog Posts</h3>
            @if(count($posts) > 0)
                <table class="table table-striped col-sm-12">
                    {{-- <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr> --}}
                    @foreach($posts as $post)
                        <tr>
                            <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                            <td><a href="/posts/{{$post->id}}/edit" class="">
                                <img class="iconSmall" src="/img/pencil.png" alt="editing pencil">
                                </a>
                            </td>
                            <td>
                                {!! Form::open
                                    ([
                                    'action' => ['PostsController@destroy', $post->id],
                                    'method' => 'POST',
                                    'class' => 'pull-right'
                                    ])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::button(
                                '<img class="iconSmall" src="/img/bin.png" alt="deleting bin">',
                                ['type' => 'submit', 'class' => 'btnNoCss'] )
                                }}
                                {!! Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no posts.</p>
            @endif
        </div>
    </div>
</div>
@endsection
