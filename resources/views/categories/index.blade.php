@extends('layouts.blog')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>All Categories</h1>
            <table class="table">
                <br>
                {{-- <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead> --}}

                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td><a href="/categories/{{$category->id}}">{{$category->name}}</a></td>
                            @if(!Auth::guest())
                                {{--if the user is not a guest, they cannot see the buttons delete and edit--}}
                                @if(Auth::user()->id == $category->user_id)
                                    {{--if the user is the writer of the post, they can see the buttons delete and edit--}}
                                    <td><a href="/categories/{{$category->id}}/edit" class="">
                                        <img class="iconSmall" src="/img/pencil.png" alt="editing pencil">
                                    </a></td>
                                    <td>
                                        {!! Form::open
                                            ([
                                            'action' => ['CategoryController@destroy', $category->id],
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
                                @endif
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'categories.store']) !!}
                    <h2>New Category</h2>
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control'] ) }}
                    {{ Form::submit('Create', ['class' => 'btn btn-primary btn-block btn-primary-spacing']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
