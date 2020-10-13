<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Product;
use App\Cart;
use App\Order;
use Auth;

class cartController extends Controller
{
    public function index(){
        $products = Product::all();
        return \view('home',\compact('products'));
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        //return $product;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        //dd($oldCart);
        $cart = new Cart($oldCart);
        $cart->addItem($product, $product->id);
        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return \redirect('/home');

    }

    public function showCart(){
        if(!Session::has('cart')){
            return \view('showCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        //dd($products);
        return \view('showCart',\compact('products','totalPrice'));
    }

    public function getcheckout(){
        if(!Session::has('cart')){
            return \view('showCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $total = $cart->totalPrice;
        return \view('checkout',\compact('products','total'));
    }

    public function postcheckout(Request $request){
        if(!Session::has('cart')){
            return \view('showCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($oldCart);
        $order = new Order();
        $order->cart = serialize($cart);
        //$order->cart = $oldCart;
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->payment_cardNo = $request->input('cardNo');

        $ord = Auth::user()->orders()->save($order);
        //dd($ord);
        Session::forget('cart');
        return redirect('/home')->with('success', 'Successfully purchased products!');
    }

    public function myorder(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            //dd($order);
            return $order;
        });
        return view('myorder', \compact('orders'));
    }

    public function getreduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect('/showCart');
    }

    public function getincreseByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increseByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect('/showCart');
    }
}
