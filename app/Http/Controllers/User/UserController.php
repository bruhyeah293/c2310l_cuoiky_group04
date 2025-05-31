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
        // $quantityss[] = $request->qty;
        // foreach($quantityss as $quantitys){
        //     foreach($quantitys as $quantity){
        //         foreach ($carts as $cart){
        //             $data['product_id'] = $cart->id;
        //             $data['qty'] = $quantity;
        //             $data['name'] = $request->name;
        //             $data['address'] = $request->address;
        //             $data['phone'] = $request->phone;
        //             $data['email'] = $request->email;
        //             $data['national'] = $request->national;
        //             $data['created_at'] = new \DateTime();
        //             DB::table('cart')->insert($data);
        //         }
        //     }
        // }

        foreach ($carts as $cart){
            $data['product_id'] = $cart->id;
            $data['qty'] = $cart->qty;
            $data['name'] = $request->name;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['national'] = $request->national;
            $data['created_at'] = new \DateTime();
            $data['status'] = 0;
            $data['total'] = $cart->total;
            DB::table('cart')->insert($data);
        }
        $carts = Cart::destroy();
        return redirect()->route('index')->with('success','Order Success');
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
