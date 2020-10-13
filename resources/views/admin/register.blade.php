@extends('layouts.main')

@section('title', 'Register Role')
 

@section('content')
                        
@include('admin.header')
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Register Role</h4>
            </div>

            <div class="col-md-6 align-center">
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                  {{session('success')}}
              </div>
              @endif
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>UserType</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>
                            <a href="/role-edit/{{ $user->id }}" class="btn btn-success">Edit</a>
                            <a href="/role-delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
                        </td>
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