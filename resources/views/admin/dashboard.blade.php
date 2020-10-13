@extends('layouts.main')

@section('title', 'Dashboard')
 

@section('content')
@include('admin.header')
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Simple Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>ID</th>
                    <th>CustomerName</th>
                    <th>PayCardNo</th>
                    <th>CartName</th>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$order->id}}</td>
                      <td>{{$order->name}}</td>
                      <td>{{$order->payment_cardNo}}</td>
                      <td>{{unserialize($order->cart)}}</td>
                      </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   @include('admin.footer')

@endsection


@section('script')
@endsection