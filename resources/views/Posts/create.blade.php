@extends('layouts.app')

@section('content')
    <h1> Create Post </h1>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'post', 'files' => true]) !!}

    <div class="form-group">
        {{ form::label('title', 'title') }}
        {{ form::text('title', '', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ form::label('body', 'Body') }}
        {{ form::textarea('body', '', ['class' => 'form-control', 'rows' => '5']) }}
    </div>
    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>
    <div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>

    {!! Form::close() !!}
@endsection
