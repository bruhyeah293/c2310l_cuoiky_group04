<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.member.index');
    }

    public function dashboard(){
        $result = DB::table('members')->count();
        $data = DB::table('products')->count(); DB::table('cart')->count();
        return view('admin.dashboard',['members' => $result],['products' => $data]);
    }

    public function cart(){
        $cart = Cart::content();
        $data = DB::table('cart')->get();
        return view('admin.cart',['totals' => $cart],['carts' => $data]);
    }

    public function success($id){
        DB::table('cart')->where('id',$id)->update(['status' => 1]);
        return redirect()->route('admin.cart')->with('success','Update Success');
    }

    public function cancel($id){
        DB::table('cart')->where('id',$id)->update(['status' => 2]);
        return redirect()->route('admin.cart')->with('success','Update Success');
    }
}
