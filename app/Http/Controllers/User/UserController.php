<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use DB;
use Termwind\Components\Dd;

class UserController extends Controller
{
    public function index(){
        $data = DB::table('products')->get();
        $cart = Cart::content();

        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        $favorites = [];

        if ($user) {
            $column = $guard === 'web' ? 'user_id' : 'member_id';
            $favorites = DB::table('favorites')
                ->where($column, $user->id)
                ->pluck('product_id')
                ->toArray();
        }

        return view('user.index', [
            'products' => $data,
            'cart' => $cart,
            'favorites' => $favorites
        ]);
    }



    public function contact(){
        $cart = Cart::content();
        return view('user.contact',['cart' => $cart]);
    }

    public function categories(){
        $data = DB::table('products')->get();
        $cart = Cart::content();

        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        $favorites = [];

        if ($user) {
            $column = $guard === 'web' ? 'user_id' : 'member_id';
            $favorites = DB::table('favorites')
                ->where($column, $user->id)
                ->pluck('product_id')
                ->toArray();
        }

        return view('user.categories', [
            'products' => $data,
            'cart' => $cart,
            'favorites' => $favorites
        ]);
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


    public function uppayment(PaymentRequest $request)
{
    $carts = \Cart::content();

    $guard = session('guard', 'web');
    $user = Auth::guard($guard)->user();

    foreach ($carts as $cart) {
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

        // Thêm thông tin người dùng
        if ($user) {
            if ($guard === 'web') {
                $data['user_id'] = $user->id;
            } else {
                $data['member_id'] = $user->id;
            }
        }

        DB::table('cart')->insert($data);
    }

    $firstProductId = $carts->first()->id ?? null;

    \Cart::destroy();

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
            ->select(
                'reviews.*',
                'products.name as product_name',
                'products.image as product_image'
            )
            ->get();

        $cart = \Cart::content();
        return view('user.reviews', compact('reviews', 'cart'));
    }

    public function push($request){
        $data = $request;
        DB::table('cart')->insert($data);
    }

    public function data_category($id){
        $data = DB::table('products')->where('category_id',$id)->get();
        $cart = Cart::content();

        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        $favorites = [];

        if ($user) {
            $column = $guard === 'web' ? 'user_id' : 'member_id';
            $favorites = DB::table('favorites')
                ->where($column, $user->id)
                ->pluck('product_id')
                ->toArray();
        }

        return view('user.categories', [
            'products' => $data,
            'cart' => $cart,
            'favorites' => $favorites
        ]);
    }


    public function contactPost(Request $request)
    {
        return redirect()->back()->with('success', 'Thank you for contacting us!');
    }

    public function favorites()
    {
        $guard = session('guard', 'web');
        $user  = Auth::guard($guard)->user();
        if (!$user) return redirect()->route('login');

        $favorites = DB::table('favorites')
            ->join('products','favorites.product_id','=','products.id')
            ->where($guard==='web' ? 'favorites.user_id':'favorites.member_id', $user->id)
            ->select('products.*')
            ->get();

        return view('user.favorites', [
            'favorites' => $favorites,
            'cart'      => Cart::content()
        ]);
    }

    public function addFavorite($productId)
    {
        $guard = session('guard', 'web');
        $user  = Auth::guard($guard)->user();
        if (!$user) return redirect()->route('login')->with('error','Bạn cần đăng nhập');

        $col = $guard==='web' ? 'user_id' : 'member_id';

        $exists = DB::table('favorites')
            ->where('product_id', $productId)
            ->where($col, $user->id)
            ->exists();

        if (!$exists) {
            DB::table('favorites')->insert([
                'product_id' => $productId,
                $col         => $user->id,
                'created_at' => now(),
            ]);
        }
        return back()->with('success','Đã thêm vào yêu thích!');
    }

    public function removeFavorite($productId)
    {
        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này.');
        }

        $query = DB::table('favorites')->where('product_id', $productId);

        if ($guard === 'web') {
            $query->where('user_id', $user->id);
        } else {
            $query->where('member_id', $user->id);
        }

        $query->delete();

        return back()->with('success', 'Đã xóa khỏi danh sách yêu thích.');
    }


    public function orders()
{
    $guard = session('guard', 'web');
    $user = Auth::guard($guard)->user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập');
    }

    $column = $guard === 'web' ? 'user_id' : 'member_id';

    $orders = DB::table('cart')
                ->where($column, $user->id)
                ->get();

    return view('user.orders', compact('orders'));
}

}
