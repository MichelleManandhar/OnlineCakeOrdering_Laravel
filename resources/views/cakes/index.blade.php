@extends('layouts.app')

@section('content')
    <h1>Cake</h1>
    @if (count($cakes) > 0)
        @foreach ($cakes as $cake)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="/storage/cake_images/{{ $cake->cake_image }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cake->title }}</h5>
                            <p class="card-text">{{ $cake->body }}</p>    
                            <h5 class="card-text">Price: <i>Rs.{{ $cake->price }} per pounds</i></h5>
                            @if ($cake->eggless_option == 'Available')
                                <h5 class="card-text">Eggless: <i>{{ $cake->eggless_option }} </i></h5>
                            @endif                            
                            {!! Form::open(['action' => 'OrderController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <input type="hidden" value={{ $cake->id }} name="cake_id">
                                {{Form::submit('Order', ['class'=>'btn btn-secondary'])}}
                            {!! Form::close() !!}
                        </div>                
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No Cakes found</p>
    @endif
    
@endsection
<footer class="fixed-bottom">
        <div style="padding: 0.1rem; padding-right: 1%;" class="card text-right">
            <div class="card-text">
                <b>Note: <i>Eggless cake costs extra Rs.200/-</i></b>
            </div>
        </div>
    </footer>