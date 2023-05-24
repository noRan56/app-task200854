@extends('layouts.app')

@section('content')
    <h1> Edit Post </h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$posts->id],'method' => 'post']) !!}

    <div class="form-group">
        {{ form::label('title','title') }}
        {{ form::text('title',$posts->title,['class'=>'form-control']) }}
    </div>

    <div class="form-group">
        {{ form::label('body','Body') }}
        {{ form::textarea('body',$posts->body,['class'=>'form-control','rows'=>'5']) }}
    </div>

    {{Form::hidden('_method','PUT')}}
    <div class="form-group">
        {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}

@endsection
