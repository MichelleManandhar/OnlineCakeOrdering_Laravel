@extends('layouts.adminapp')

@section('content')
    {!! Form::open(['action' => 'CakeDesignController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('design_image', 'Design Image')}}<br/>
            {{ Form::file('design_image') }}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection }}
