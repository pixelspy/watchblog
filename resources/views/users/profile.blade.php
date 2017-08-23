@extends('layouts.blog')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:100px; height:100px; float:left; border-radius:50%; margin-right:25px;" alt="">
            <h2>{{$user->name}}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label for="">Update profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
<hr>
<h1>Edit Profil</h1>
{!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])  !!}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', $user->name, ['class'=>'form-control', 'placeholder' => 'Name'])}}
</div>

<div class="form-group">
    {{Form::label('email', 'Email')}}
    {{Form::text('email', $user->email, ['class'=>'form-control', 'placeholder' => 'email'])}}
</div>

{{Form::hidden('_method', 'PUT')}}

{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection