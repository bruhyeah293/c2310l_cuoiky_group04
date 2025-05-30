<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class HomeController extends Controller
{
    public function index(){
        $data = DB::table('products')->get();
        $cart = Cart::content();
        return view('user.index',['products' => $data],['cart' => $cart]);
    }

    public function addToCart($id){
        $products = DB::table('products')->where('id',$id)->first();
        Cart::add($id,$products->name, 1,$products->price);
        return redirect()->route('cart')->with('success', 'Add to Cart successfully');
    }

    public function cart(){
        $cart = Cart::content();
        return view('user.cart',['cart' => $cart]);
    }

    public function deleteCart($rowId){
        Cart::remove($rowId);
        return redirect()->route('cart');
    }
}
