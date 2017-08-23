@extends('layouts.blog')
@section('content')

    All users :
    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-4 containerUsers">
                    <img src="/uploads/avatars/{{$user->avatar}}" style="padding-right: 3px; width:25px; height: 25px; top:10px; left:10px; border-radius:50%;">
                    <a href="/users/{{$user->id}}">{{$user->name}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
