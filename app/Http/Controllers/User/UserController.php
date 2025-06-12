<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PaymentRequest;
use Illuminate\Http\Request;
use Cart;
use DB;
use Termwind\Components\Dd;

class UserController extends Controller
{
    public function index(){
        $data = DB::table('products')->get();
        $cart = Cart::content();
        return view('user.index',['products' => $data],['cart' => $cart]);
    }

    public function contact(){
        $cart = Cart::content();
        return view('user.contact',['cart' => $cart]);
    }

    public function categories(){
        $data = DB::table('products')->get();
        $cart = Cart::content();
        return view('user.categories',['products' => $data],['cart' => $cart]);
    }

    public function single($id){
        $result = DB::table('products')->where('id',$id)->first();
        $cart = Cart::content();
        return view('user.single',['cart' => $cart,'product' => $result],);
    }

    public function payment(){
        $cart = Cart::content();
        return view('user.payment',['cart' => $cart]);
    }
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }


    public function uppayment(PaymentRequest $request){
    $carts = Cart::content();

    foreach ($carts as $cart){
        $data = [
            'product_id' => $cart->id,
            'qty'        => $cart->qty,
            'name'       => $request->name,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'national'   => $request->national,
            'created_at' => now(),
            'status'     => 0,
            'total'      => $cart->total,
        ];

        DB::table('cart')->insert($data);
    }

    $firstProductId = $carts->first()->id ?? null;

    Cart::destroy();

    if ($firstProductId) {
        return redirect()->route('review.form', ['product_id' => $firstProductId])
        ->with('success','Order Success! Write your review or press Cancel to return to home');
    }

    return redirect()->route('index')->with('success','Order Success');
}

    public function allReviews()
{
    $reviews = DB::table('reviews')
        ->join('products', 'reviews.product_id', '=', 'products.id')
        ->select('reviews.content', 'reviews.product_id', 'products.name')
        ->get();

    $cart = Cart::content();
    return view('user.reviews', compact('reviews', 'cart'));
}



    public function push($request){
        $data = $request;
        DB::table('cart')->insert($data);
    }

    public function data_category($id){
        $data = DB::table('products')->where('category_id',$id)->get();
        $cart = Cart::content();
        return view('user.categories',['products' => $data],['cart' => $cart]);
    }
    public function contactPost(Request $request)
    {
        return redirect()->back()->with('success', 'Thank you for contacting us!');
    }

}
