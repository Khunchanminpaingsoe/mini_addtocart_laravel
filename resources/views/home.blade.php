@extends('layouts.main')
@include('auth.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
       <h1>Let's Buy What You Want To Own</h1>
    </div>
</div>
<div class="col-md-6 align-center">
  @if (session('success'))
  <div class="alert alert-success" role="alert">
      {{session('success')}}
  </div>
  @endif
</div>
<div class="container mt-5">
    <div class="card-deck">

        @foreach($products as $product)
        <div class="card col-md-4">
            <h5>${{ $product->price }}</h5>
            <img src="{{ URL::to($product->image)}}" class="card-img-top" alt="..." style="width: 150px; height:150px; margin-left:auto; margin-right:auto">
              <div class="card-body">
              <h4 class="card-title">{{ $product->productName }}</h4>
              <p class="card-text">{{ $product->details }}</p>
                <a href="" class="btn btn-warning float-left btn-sm">Details</a>
              <a href="/addToCart/{{ $product->id }}" class="btn btn-success float-right btn-sm">AddToCart</a>
              </div>
            </div>
        @endforeach
        
    </div>
</div>
    
</div>
@endsection
