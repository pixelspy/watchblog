@extends('layouts.blog')

@section('content')
    <h1>Edit Profil</h1>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])  !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $user->name, ['class'=>'form-control', 'placeholder' => 'Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::textarea('email', $user->email, ['id' => 'article-ckeditor', 'class'=>'form-control', 'placeholder' => 'email'])}}
    </div>

    {{Form::hidden('_method', 'PUT')}}

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection