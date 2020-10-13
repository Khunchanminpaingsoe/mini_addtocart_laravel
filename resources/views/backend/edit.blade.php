@extends('layouts.main')

@section('title', 'Category')
 

@section('content')
@include('admin.header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/update-category/{{$categories->id}}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label for="name" class="col-form-label">Category Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $categories->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description">{{ $categories->description }}</textarea>
                                </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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
