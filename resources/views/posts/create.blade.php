@extends('layouts.blog')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open([
      'action' => 'PostsController@store',
      'method' => 'POST',
      'enctype' => 'multipart/form-data'])  !!}
    {{--multipart/form-data enables the BROWSE UPLOAD Button--}}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class'=>'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('category_id', 'Category:')}}
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea(
          'body',
          '',
          ['id' => 'article-ckeditor',
          'class'=>'form-control',
          'placeholder' => 'Body text']
          )}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
