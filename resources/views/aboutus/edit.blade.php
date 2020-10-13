@extends('layouts.main')

@section('title', 'About Us')
 

@section('content')
@include('admin.header')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update New Data</h4>
                <form action="/update-aboutus/{{ $aboutus->id }}" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                      <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $aboutus->title }}">
                    </div>
                    <div class="form-group">
                        <label for="subtitle" class="col-form-label">Sub-Title:</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $aboutus->subtitle }}">
                    </div>
                    <div class="form-group">
                      <label for="description" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{ $aboutus->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <a href="/aboutus" class="btn btn-secondary">Back</a>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
@endsection
    