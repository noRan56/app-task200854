@extends('layouts.app')

@section('content')
    <h1>Media Preview </h1>
    <hr>
    <a href="/app-try/public/media" class="btn btn-secondary">Go Back</a>
    @if (Auth::user())
        @if (Auth::user()->id == $media->user->id)
            {!! Form::open([
                'action' => ['App\Http\Controllers\MediaController@destory', $media->id],
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
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-4">
            <img src="/public/photos/{{ $media->name }}" style=" width:50%; height:100%">

        </div>
    </div>
@endsection

