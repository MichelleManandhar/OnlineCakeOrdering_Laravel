@extends('layouts.adminapp')

@section('content')

    <h3>Add, Edit and Delete Cake Designs From Here</h3>
    
    <div class="pannel-body">
        <a href="/design/create" class="btn btn-primary">Add Design</a>
        <h3>Your Designs are</h3>
        @if(count($designs) > 0 )
            <table class="table table-striped">
                <tr>
                    <th>Design</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($designs as $design)
                    <tr>
                        <td><img width="250rem" height="250rem" src="/storage/design_images/{{ $design->design_image }}"></td>
                        <td><a href="/design/{{ $design->id }}/edit" class="btn btn-default">Edit</a></td>
                        <td>{!!Form::open(['action' => ['CakeDesignController@destroy', $design->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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