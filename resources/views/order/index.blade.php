@extends('layouts.app')

@section('content')  
    {!! Form::open(['action' => 'OrderController@save_design', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{Form::label('cake_design', 'Select Cake Design')}}
    <div style="height: 700px">

        @if (count($designs) > 0)
        
            @foreach ($designs as $design)            
                <div style="float:right">
                    <input type="radio" name='cake_design' value='{{ $design->id }}'>
                    <br>
                    <img style="width:200px; height:200px" src="/storage/design_images/{{ $design->design_image }}" class="card-img" alt="...">
                </div>            
            @endforeach
        
        @else
            <p>No Designs found</p>
        @endif
    </div>
        <div class="form-group">
            {{Form::label('cake_message', 'Cake Message')}}
            {{Form::text('cake_message', '', ['class' => 'form-control', 'placeholder' => 'Message you want to write in cake. Eg.Happy Birthday John'])}}
        </div>
        <div class="form-group">
            <label for="quantity">Choose quantity <i>(in pounds)</i></label>
            <select class="custom-select" id="quantity" name="qty">
                <option value=1 selected>1</option>
                @for ($i = 2; $i <= 15; $i++)
                    <option value={{ $i }}>{{ $i }}</option>
                @endfor
            </select>
        </div>            

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}} <a class="btn btn-danger" href="/cakes/order/cancel">Cancel Order</a>
    {!! Form::close() !!}
@endsection
