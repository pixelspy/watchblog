@extends('layouts.blog')
@section('content')

    All users :
    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-4"><a href="/users/{{$user->id}}">{{$user->name}}</a></div>
            @endforeach
        </div>
    </div>
@endsection
