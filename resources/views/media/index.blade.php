@extends('layouts.app')

@section('content')
    <h1> Media </h1>
    <hr>
    @if ( $media && count($media) > 0)
        <div class="row">
            @foreach ($media as $photo)
                <div class="col-md-4 col-sm-6">
                    <a href="/app-try/public/media/{{ $photo->id }}">
                        <img src="/public/photos/{{ $photo->name }}" class="img-thumbnail" style=" width:100%; height:100%">
                    </a>
                </div>
            @endforeach
            {{ $media->links() }}
        </div>
    @else
        <p> No Media Avaliable</p>
    @endif

@endsection
