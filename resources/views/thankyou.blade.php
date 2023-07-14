@extends('layouts.app')

@section('content')

    <div class="card" style="width: 30rem;">
        <div class="card-text" style="padding: 2%">
            <h3>Thank you for your order.</h3>
            <h4>Your total cost is <i>Rs. {{ $total_cost }}<sub><small> !!!Cash on Delivery!!! </small></sub></i></h4> 
        </div>
    </div>
    
@endsection