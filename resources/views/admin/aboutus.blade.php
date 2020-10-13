@extends('layouts.main')

@section('title', 'About Us')
 

@section('content')
@include('admin.header')
<div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/save-aboutus" method="POST">
            @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="title" class="col-form-label">Title:</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="subtitle" class="col-form-label">Sub-Title:</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle">
            </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Description:</label>
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
</div>

  
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            
            <div class="card-header">
              <h4 class="card-title"> About us</h4>
              <div class="col-md-6 align-center">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
                @endif
              </div>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData" data-whatever="@fat">ADD</button>
            </div>            
            
            <div class="card-body">
              <div class="table-responsive">
                <table id="myTable" class="table">
                  <thead class=" text-primary">
                    <th>ID</th>
                    <th width="30px">Title</th>
                    <th width="100px">Sub-Title</th>
                    <th width="300px">Description</th>
                    <th>Action</th>
                  </thead>
                  <tbody>

                      @foreach($aboutus as $about)
                      <tr>
                        <td>{{ $about->id }}</td>
                        <td>{{ $about->title }}</td>
                        <td>{{ Str::limit($about->subtitle , $limit=20) }}</td>
                        <td>{{ Str::limit($about->description , $limit=100) }}</td>
                          <td>
                          <a href="/edit-aboutus/{{ $about->id }}" class="btn btn-success">Edit</a>
                          <a href="/delete-aboutus/{{ $about->id }}" class="btn btn-danger">Delete</a>
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
<script>
        $(document).ready( function () {
          $('#myTable').DataTable();
      } );
</script>
@endsection