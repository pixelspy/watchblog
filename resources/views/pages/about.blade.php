@extends('layouts.blog')

@section('content')
    <h1>{{$title}}</h1>
    <p>Description of the project</p>
    <ul>
        <p>Future objectives:</p>
        <li>Regularly add content.</li>
        <li>Create categories for the posts, in the admin panel.</li>
        <li>Create a search bar, in order for the users and visitors to filter by categories.</li>
        <li>Better Web Design.</li>
    </ul>
    {{--@if(count($categories) > 0)
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">{{$category}}</li>
            @endforeach
        </ul>
    @endif--}}
@endsection

