<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cart;

class HomeController extends Controller
{
    public function index(){
        $data = DB::table('products')->get();
        $cart = Cart::content();
        return view('user.index', ['products' => $data], ['cart' => $cart]);
    }

    public function addToCart(Request $request, $id)
    {
        $guard = session('guard', 'web');  // 'web' or 'member'

        if (!Auth::guard($guard)->check()) {
            return redirect()
                   ->route('login')
                   ->with('error', 'You need to log in to add products to the cart!');
        }

        $product = DB::table('products')->find($id);

        if (!$product) {
            return redirect()->route('cart')->with('error', 'Product does not exist!');
        }

        $quantity = max(1, (int) $request->input('quantity', 1));

        Cart::add([
            'id'     => $id,
            'name'   => $product->name,
            'qty'    => $quantity,
            'price'  => $product->price,
            'weight' => 0,
        ]);

        return redirect()->route('user.cart')->with('success', 'Added to cart!');
    }

    public function cart(){
        $cart = Cart::content();
        return view('user.cart', ['cart' => $cart]);
    }

    public function deleteCart($rowId){
        Cart::remove($rowId);
        return redirect()->route('cart');
    }
}
