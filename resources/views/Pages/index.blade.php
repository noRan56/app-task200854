@extends('layouts.master')

@section('content')
    <div class="jumbotron text-center">
        <h1 style="font-size: 3.5rem;"> {{ $title }}</h1>
        <p> Hi Guys welcome in My Project</p>
        <a href="/app-try/public/login"class="btn btn-success">Log in</a>
        <a href="/app-try/public/register"class="btn btn-primary">Register</a>.-
    </div>
@endsection
