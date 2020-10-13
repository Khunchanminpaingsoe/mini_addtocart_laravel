@extends('layouts.main')

@section('title', 'Edit Role')
 

@section('content')
@include('admin.header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Registered Person</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/role-update/{{$users->id}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                <input type="name" class="form-control" id="name" name="name" value="{{ $users->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="usertype">Give Role</label>
                                    <select class="form-control" id="usertype" name="usertype">
                                      <option value="admin">Admin</option>
                                      <option value="user">Normal User</option>
                                      <option value="">None</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                <a href="/register-role" class="btn btn-danger btn-sm">Cancel</a>
                            </form>
                        </div>
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