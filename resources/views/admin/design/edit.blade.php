@extends('layouts.adminapp')

@section('content')
    {!! Form::open(['action' => ['CakeDesignController@update', $design->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('design_image', 'Design Image')}}<br/>
            {{ Form::file('design_image') }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection }}
