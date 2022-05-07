<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Session;

class HomeController extends Controller
{
    //
    function index(){
        $data = Product::all();
        return view('home',['products'=>$data]);
    }
    function detail ($id){
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }
    static function cartCount(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function addToCart (Request $req){
        if($req->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id=session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }
    function cart(){
        $user_id=Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$user_id)
            ->select('products.*','cart.id as cart_id')
            ->get();
        return view('/cart',['products'=>$products]);
    }
    function removeCart($id){
        Cart::destroy($id);
        return redirect('/cart');
    }
    function order(){
        $user_id=Session::get('user')['id'];
        $total = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$user_id)
            ->sum('products.price');
        return view('/confirm_order',['total'=>$total]);
    }
    function order_confirm(Request $req){
        $user_id=Session::get('user')['id'];
        $order = new Order();
        $order->user_id=$user_id;
        $order->address=$req->address;
        $order->postal_code=$req->postal_code;
        $order->status="pending";
        $order->total=$req->total;
        $order->save();

        $order_id=Order::all()->last()->id;
        $allCart=Cart::where('user_id',$user_id)->get();
        foreach ($allCart as $cart){
            $order_item = new Order_item();
            $order_item->order_id=$order_id;
            $order_item->product_id=$cart['product_id'];
            $order_item->timestamps=false;
            $order_item->save();
        }
        Cart::where('user_id',$user_id)->delete();
        $req->input();

        return redirect('/');
    }
    function orderList(){
        $user_id=Session::get('user')['id'];
        $data = DB::table('order_items')
            ->join('orders','order_items.order_id','=','orders.id')
            ->join('products','order_items.product_id','=','products.id')
            ->where('orders.user_id',$user_id)
            ->select(
                'order_items.order_id as order_id',
                'orders.status as status',
                'orders.total as total',
                'orders.created_at as order_date',
                'products.name as product_name',
                'products.price as product_price')
            ->get();

        return view('orders',['data'=>$data,]);
    }
}
