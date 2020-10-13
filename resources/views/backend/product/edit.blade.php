@extends('layouts.main')

@section('title', 'Edit Product')
 

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
                      <form action="/update-product/{{$products->id}}" method="POST" enctype="multipart/form-data">
                          @csrf
                              
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="productName">Product Name:</label>
                                    <input type="text" class="form-control" id="productName" name="productName" value="{{ $products->productName }}">
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
                                      <input type="text" class="form-control" id="productCode" name="productCode" value="{{$products->productCode}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="productCode">Price:</label>
                                      <input type="text" class="form-control" id="price" name="price" value="{{$products->price}}">
                                    </div>
                                  </div>
            
                                  <div class="form-group">
                                    <label for="details" class="col-form-label">Details:</label>
                                    <textarea class="form-control" id="details" name="details">{{$products->details}}</textarea>
                                  </div>
            
                                  <div class="form-group">
                                    <label for="image">Product Image:</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                  </div>
                                  <div class="form-group">
                                    <img src="{{ URL::to($products->image)}}" width="80px;" height="80px;">
                                    <input type="hidden" name="old_image" value="{{ $products->image }}">
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


