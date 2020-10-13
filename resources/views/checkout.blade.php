@extends('layouts.main')

@section('title', 'Checkout')

@section('content')
@include('auth.navbar')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>CheckOut</h1>
            <h4>Your Total: ${{ $total }}</h4>
                    <form action="/postcheckOut" method="post" id="checkout-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="card-name">Card Holder Name</label>
                                    <input type="text" id="card-name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="card-number">Credit Card Number</label>
                                    <input type="text" id="card-number" name="cardNo" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="card-expiry-month">Expiration Month</label>
                                            <input type="text" id="card-expiry-month" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="card-expiry-year">Expiration Year</label>
                                            <input type="text" id="card-expiry-year" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="card-cvc">CVC</label>
                                    <input type="text" id="card-cvc" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Buy now</button>
                    </form>
            </div>
        </div>
@endsection