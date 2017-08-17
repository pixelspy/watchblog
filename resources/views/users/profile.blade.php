@extends('layouts.blog')
@section('content')

<a href="{{ route('users.edit', array('id'=>Auth::user()->id)) }}"><img class="imgPara" src="/img/para.svg" alt=""></a>

@endsection