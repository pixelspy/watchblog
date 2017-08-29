@extends('layouts.blog')
@section('content')
    <h1>Edit Category : {{$category->name}}</h1>
    {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'POST'])  !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $category->name, ['class'=>'form-control', 'placeholder' => 'Name'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
