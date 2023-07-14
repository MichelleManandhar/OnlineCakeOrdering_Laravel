@extends('layouts.app')

@section('content')
    <a href="/cakes" class="btn btn-default">Go Back</a>
    <h1>{{ $cake->title }}</h1>
    <div>
    <h2>{!! $cake->body !!}</h2>
    </div>

    {{-- Edit Button For admin --}}
    <a href="/cakes/{{$cake->id}}/edit" class="btn btn-default">Edit</a>

    {{-- Delete Button for admin --}}
    {!!Form::open(['action' => ['CakesController@destroy', $cake->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection
