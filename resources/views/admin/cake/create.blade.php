@extends('layouts.adminapp')

@section('content')
    <h3>Add Cake</h3>
    {!! Form::open(['action' => 'CakesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body-Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div><div class="form-group">
            {{Form::label('eggless_option', 'Eggless Option')}}
            <input type="radio" class="form-group" name="eggless_option" value="Available">Available 
            <input type="radio" class="form-group" name="eggless_option" value="Not Available">Not Available
        </div>
        <div class="form-group">
            {{Form::label('cake_image', 'Cake Image')}}<br/>
            {{ Form::file('cake_image') }}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection
