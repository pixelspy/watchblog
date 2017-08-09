@extends('layouts.blog')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>All Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
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
