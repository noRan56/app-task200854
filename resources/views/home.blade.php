@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Dashboard</div>

                    <div class="card-body">
                        <a href="/app-try/public/Posts/create"class="btn btn-primary btn-sm">Create Post</a>
                        <h5 style="margin:20px 0; ">Your Blog Posts </h5>
                        <hr>

                        @if ($posts && count($posts) > 0)
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">title</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $post->title }}</th>
                                            <td> <a href="/app-try/public/Posts/{{ $post->id }}/edit"
                                                    class="btn btn-outline-secondary"></a>Edit</td>
                                            <td>
                                                {!! Form::open([
                                                    'action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                                                    'method' => 'post',
                                                    'class' => 'd-inline float-right',
                                                ]) !!}



                                                {{ Form::hidden('_method', 'DELETE') }}
                                                <div class="form-group">
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger']) }}
                                                </div>

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        @else
                            <p> No Posts Avaliable </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Media Dashboard</div>

                    <div class="card-body">
                        <a href="/app-try/public/media/create"class="btn btn-primary btn-sm">Create Media</a>
                        <h5 style="margin:20px 0; ">Your Media </h5>
                        <hr>
                        @if ( $media && count($media) > 0)
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">title</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($media as $photo)
                                        <tr>
                                            <th scope="row"><img sr="/photos/{{ $photo->name }}"
                                                    style=" width:60%; height:60%"></th>
                                            <td> <a href="/app-try/public/media/{{ $photo->id }}" class="btn btn-outline-secondary"></a>
                                                Show</td>
                                            <td>
                                                {!! Form::open([
                                                    'action' => ['App\Http\Controllers\MediaController@destroy', $photo->id],
                                                    'method' => 'post',
                                                    'class' => 'd-inline float-right',
                                                ]) !!}



                                                {{ Form::hidden('_method', 'DELETE') }}
                                                <div class="form-group">
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger']) }}
                                                </div>

                                                {!! Form::close() !!}


                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        @else
                            <p> No Media Avaliable </p>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
