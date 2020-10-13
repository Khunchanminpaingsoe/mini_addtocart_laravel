<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;
use DB;
use Session;

class BackendController extends Controller
{
    public function index(){
        $categories = Category::all();
        return \view('backend.index', \compact('categories'));
    }

    public function store(Request $request){
        $categories = new Category();
        $categories->name = $request->input('name');
        $categories->description = $request->input('description');
        $categories->save();

        Session::flash('statuscode', 'success');
        return \redirect('/backend-category')->with('status', 'New Category created Successfully');
    }

    public function edit($id){
        $categories = Category::whereId($id)->firstOrFail();
        return \view('backend.edit', \compact('categories'));
    }

    public function update(Request $request, $id){
        $categories = Category::whereId($id)->firstOrFail();
        $categories->name = $request->input('name');
        $categories->description = $request->input('description');
        $categories->update();

        Session::flash('statuscode','success');
        return \redirect('/backend-category')->with('status','Category Updated Successfully');
    }

    public function delete($id){
        $categories = Category::whereId($id)->firstOrFail();
        $categories->delete();

        Session::flash('statuscode', 'error');
        return \redirect('/backend-category')->with('status', 'Category Deleted Successfully');
    }

    //Products
    
    public function create(){
        $products = Product::all();
        $categories = Category::all();
        return \view('backend.product.create',\compact('products','categories'));
    }

    public function save(Request $request){
        $products = new Product();

        $image = $request->file('image');
        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            
            $products->categoryName = $request->input('categoryName');
            $products->productName = $request->input('productName');
            $products->productCode = $request->input('productCode');
            $products->details = $request->input('details');
            $products->price = $request->input('price');
            $products->image = $image_url;

            $products->save();
            Session::flash('statuscode','success');
            return \redirect('/create-product')->with('status', 'Product created successfully');
        }

    }
    public function edited($id){
            $products = Product::whereId($id)->firstOrFail();
            $categories = Category::all();
            return \view('backend.product.edit',\compact('products','categories'));
    }

    public function updated(Request $request, $id){
        $products = Product::whereId($id)->firstOrFail();
        $old_image = $request->input('old_image');

        $image = $request->file('image');
        if($image){
            \unlink($old_image);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            
            $products->categoryName = $request->input('categoryName');
            $products->productName = $request->input('productName');
            $products->productCode = $request->input('productCode');
            $products->details = $request->input('details');
            $products->price = $request->input('price');
            $products->image = $image_url;

            $products->update();
            Session::flash('statuscode','success');
            return \redirect('/create-product')->with('status', 'Product updated successfully');
        }
    }

    public function destroy($id){
        $products = Product::whereId($id)->firstOrFail();
        $products->delete();

        Session::flash('statuscode','error');
        return \redirect('/create-product')->with('status', 'Product updated successfully');
    }

    public function order(){
        $orders = Order::all();
        return \view('admin.dashboard',\compact('orders'));
    }
}
