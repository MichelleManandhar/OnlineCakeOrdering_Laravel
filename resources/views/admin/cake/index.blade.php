
@extends('layouts.adminapp')

@section('content')

    <h3>Add, Edit and Delete Cakes From Here</h3>
    
    <div class="pannel-body">
        <a href="/cakes/create" class="btn btn-primary">Create Cake</a>
        <h3>Your Cakes are</h3>
        @if(count($cakes) > 0 )
            <table class="table table-striped">
                <tr>
                    <th>Cakes</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($cakes as $cake)
                    <tr>
                        <td>{{ $cake->title }}</td>
                        <td><a href="/cakes/{{ $cake->id }}/edit" class="btn btn-default">Edit</a></td>
                        <td>{!!Form::open(['action' => ['CakesController@destroy', $cake->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>You have no posts</p>
        @endif
    </div>
    
@endsection
