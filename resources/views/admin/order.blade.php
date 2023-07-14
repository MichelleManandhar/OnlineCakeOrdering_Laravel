@extends('layouts.adminapp')

@section('content')

    <h3>Your orders are</h3>   
    @if(count($orders) > 0 )
        <table class="table table-striped">
            <tr>
                <th>Order Date</th>
                <th>User ID</th>
                <th>Cake ID</th>
                <th>Design ID</th>
                <th>Quantity</th>
                <th>Cake Message</th>
                <th>Total Cost</th>
            </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->cake_id }}</td>
                <td>{{ $order->cake_design }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->cake_message }}</td>
                <td>{{ $order->total_cost }}</td>
            </tr>
        @endforeach
        </table>
    @else
        <p>You have no order</p>
    @endif                
@endsection
