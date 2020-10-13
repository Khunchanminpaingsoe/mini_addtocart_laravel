@extends('layouts.main')

@section('title', 'Product')
 
@section('content')
@include('admin.header')
    <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="/store-product" method="POST" enctype="multipart/form-data">
              @csrf
                  <div class="modal-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="productName">Product Name:</label>
                          <input type="text" class="form-control" id="productName" name="productName">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="categoryName">Category Name:</label>
                          <select id="categoryName" class="form-control" name="categoryName">
                              @foreach($categories as $category)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
                              @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="productCode">Product Code:</label>
                          <input type="text" class="form-control" id="productCode" name="productCode">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="productCode">Price:</label>
                          <input type="text" class="form-control" id="price" name="price">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="details" class="col-form-label">Details:</label>
                        <textarea class="form-control" id="details" name="details"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="image">Product Logo:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
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
              <h4 class="card-title">Product</h4>
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
                    <th width="30px">Category Name</th>
                    <th width="30px">Product Name</th>
                    <th width="30px">Product Code</th>
                    <th width="300px">Details</th>
                    <th width="30px">Image</th>
                    <th>Action</th>
                  </thead>
                  <tbody>

                      @foreach($products as $product)
                        <tr>
                        <td>{{$product->id}}</td>
                          <td>{{$product->category->name}}</td>
                          <td>{{$product->productName}}</td>
                          <td>{{$product->productCode}}</td>
                          <td>{{$product->details}}</td>
                          <td><img src="{{ URL::to($product->image )}}" width="80px;" height="80px;"></td>
                            <td>
                            <a href="/edit-product/{{$product->id}}" class="btn btn-success">Edit</a>
                            <a href="/delete-product/{{$product->id}}" class="btn btn-danger">Delete</a>
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