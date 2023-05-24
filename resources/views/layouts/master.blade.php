<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1">
{{--    link css--}}
    <link rel="stylesheet"href="{{asset('/css/app.css')}}">

    @yield('styles')
    <title>Laravel</title>

</head>

<body>
    @include('inc.nav')
<div class="container">
    @include('inc.massages')
    @yield('content')
</div>


@yield('scripts')
</body>
</html>
