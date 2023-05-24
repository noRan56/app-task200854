@extends('layouts.app')

@section('content')
    <a href="/app-try/public/Posts/" class="btn btn-outline-secondary">Go Back </a>
    <h1 style="padding:15px ">{{ $posts->title }} </h1>
    <img style="width:100%" src="/covers/{{ $posts->cover_image }}"alt="{{ $posts->cover_image }}">

    <p>
        {!! $posts->body !!}
    </p>
    <hr>
    <small> Created at : {{ $posts->created_at }}</small>
    <hr>
    @if (Auth::user())
        @if (Auth::user()->id == $posts->user->id)
            <a href="/app-try/public/Posts/{{ $posts->id }}/edit" class="btn btn-outline-secondary">Edit</a>
            {!! Form::open([
                'action' => ['App\Http\Controllers\PostsController@destroy', $posts->id],
                'method' => 'post',
                'class' => 'd-inline float-right',
            ]) !!}



            {{ Form::hidden('_method', 'DELETE') }}
            <div class="form-group">
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            </div>

            {!! Form::close() !!}
        @endif
    @endif
@endsection
