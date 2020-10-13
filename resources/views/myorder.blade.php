@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>User Profile</h1>
            <hr>
            <h2>My Orders</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    {{ $item['item']['productName'] }} | {{ $item['qty'] }} Units
                                </li>
                                <li class="list-group-item">
                                    <span>${{ $item['price'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection