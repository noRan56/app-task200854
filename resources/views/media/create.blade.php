@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.min.css" >
@endsection
@section('content')
    <h1> Create Media </h1>


    <div class="row">
      <div class="col-md-8">

          {!! Form::open(['action' => 'App\Http\Controllers\MediaController@store','method' => 'post', 'files'=>true,'class' =>'dropzone']) !!}

{{--          <div class="form-group">--}}
{{--              {{ form::label('title','title') }}--}}
{{--              {{ form::text('title','',['class'=>'form-control']) }}--}}
{{--          </div>--}}

{{--          <div class="form-group">--}}
{{--              {{ form::label('body','Body') }}--}}
{{--              {{ form::textarea('body','',['class'=>'form-control','rows'=>'5']) }}--}}
{{--          </div>--}}
{{--          <div class="form-group">--}}
{{--              {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}--}}
{{--          </div>--}}

          {!! Form::close() !!}

      </div>
    </div>

    </form>


@endsection


@section('scripts')

<script  src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.min.js">
</script>
@endsection
