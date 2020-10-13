@extends('layouts.main')

@section('title', 'Shopping Cart')

@section('content')
@include('auth.navbar')
<div class="container">
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                        <strong>{{ $product['item']['productName'] }}</strong>
                        <div class="btn-group ml-5" role="group">
                            <a href="/reduceByOne/{{ $product['item']['id'] }}" class="btn btn-info btn-sm" >-</a>
                            <button type="button" class="btn btn-outline-dark btn-sm">{{ $product['qty'] }}</button>
                            <a href="/increseByOne/{{ $product['item']['id'] }}" class="btn btn-info btn-sm">+</a>
                        </div>
                        <span class="float-right mt-2">${{ $product['price'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <strong>Total: ${{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <a href="/getcheckOut"><button type="button" class="btn btn-success">Checkout</button></a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <h2>No Item in Cart!</h2>
            </div>
        </div>
    @endif
</div>        
@endsection