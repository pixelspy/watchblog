@extends('layouts.blog')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($categories) > 0)
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">{{$category}}</li>
            @endforeach
        </ul>
    @endif
@endsection

