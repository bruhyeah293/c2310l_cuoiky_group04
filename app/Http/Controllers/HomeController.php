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

        public function addToCart(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng!');
        }

        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->route('cart')->with('error', 'Sản phẩm không tồn tại!');
        }

        $quantity = max(1, (int) $request->input('quantity', 1));

        Cart::add([
            'id'      => $id,
            'name'    => $product->name,
            'qty'     => $quantity,
            'price'   => $product->price,
            'weight'  => 0,
        ]);


        return redirect()->route('cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
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
