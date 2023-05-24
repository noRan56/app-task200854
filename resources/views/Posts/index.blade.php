@extends('layouts.app')

@section('content')
    <h1> Posts </h1>
    @if ($posts && count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/covers/{{ $post->cover_image }}"alt="{{ $post->cover_image }}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="card-title">
                                <a href="/app-try/public/Posts/{{ $post->id }}">
                                    <h2>
                                        {{ $post->title }}
                                    </h2>
                                </a>
                                <small> created at : {{ $post->created_at }} by {{ $post->user->name }}</small>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        @endforeach
{{--        {{ $post->links() }}--}}
    @else
        <p> No Posts Avaliable</p>
    @endif

@endsection
