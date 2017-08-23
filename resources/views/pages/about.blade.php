@extends('layouts.blog')

@section('content')
    <h1>{{$title}}</h1>
    <hr>
    <p>This website is a project I made with Laravel for a challenge set up by SimplonProd, a web agency.</p>
    <br>
    <p>After my internship at this agency, I realised they were missing a platform on which all their tech research could be available.
    Every Friday the team gathers to share their research and I felt the need to centralise all this valuable information.</p>
    <hr>
    <ul>
        <p>Future objectives :</p>
        <li>Regularly add content.</li>
        <li>Create categories for the posts, in the admin panel.</li>
        <li>Create a search bar, in order for the users and visitors to filter by categories.</li>
        <li>Better Web Design.</li>
    </ul>
@endsection

