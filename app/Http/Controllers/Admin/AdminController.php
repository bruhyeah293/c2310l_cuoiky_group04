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

    // public function success($id){
    //     DB::table('cart')->where('id',$id)->update(['status' => 1]);
    //     return redirect()->route('admin.cart')->with('success','Update Success');
    // }

    // public function cancel($id){
    //     DB::table('cart')->where('id',$id)->update(['status' => 2]);
    //     return redirect()->route('admin.cart')->with('success','Update Success');
    // }
    public function success($id) {
    $order = DB::table('cart')->where('id', $id)->first();

    if ($order) {
        // Nếu đơn hàng đã duyệt (status = 1), chặn việc duyệt lại
        if ($order->status == 1) {
            return redirect()->back()->with('error', 'Đơn hàng này đã được duyệt trước đó, không thể duyệt lại!');
        }

        // Tìm sản phẩm theo `product_id`
        $product = DB::table('products')->where('id', $order->product_id)->first();

        // Kiểm tra nếu số lượng sản phẩm còn đủ
        if ($product && $product->quantity >= $order->qty) {
            DB::table('products')->where('id', $product->id)->update([
                'quantity' => $product->quantity - $order->qty
            ]);

            // Duyệt đơn hàng
            DB::table('cart')->where('id', $id)->update(['status' => 1]);

            return redirect()->back()->with('success', 'Đơn hàng đã được duyệt thành công!');
        } else {
            return redirect()->back()->with('error', 'Số lượng sản phẩm không đủ!');
        }
    }

    return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
}


    public function cancel($id) {
    DB::table('cart')->where('id', $id)->update(['status' => -1]); // Đơn hàng bị hủy
    return redirect()->back()->with('success', 'Order has been cancelled!');
}


}
