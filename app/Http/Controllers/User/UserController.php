<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Cart;

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
        return view('user.contact', ['cart' => $cart]);
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
        return view('user.single', ['cart' => $cart, 'product' => $result]);
    }

    public function payment()
    {
        $cart = Cart::content();

        if ($cart->count() == 0) {
            return redirect()->route('index')->with('error', 'Please add at least one product to your cart before checking out.');
        }

        return view('user.payment', ['cart' => $cart]);
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
        $carts = Cart::content();

        if ($carts->count() == 0) {
            return redirect()->route('index')->with('error', 'There are no items in the cart to checkout.');
        }

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
                'status'     => -1,
                'total'      => $cart->total,
            ];

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

        Cart::destroy();

        if ($firstProductId) {
            return redirect()->route('review.form', ['product_id' => $firstProductId])
                ->with('success','Order placed successfully! Leave a review or press Cancel to return to the homepage.');
        }

        return redirect()->route('index')->with('success','Order placed successfully.');
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
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Thank you for contacting us!');
    }

    public function favorites()
    {
        $guard = session('guard', 'web');
        $user  = Auth::guard($guard)->user();
        if (!$user) return redirect()->route('login');

        $favorites = DB::table('favorites')
            ->join('products','favorites.product_id','=','products.id')
            ->where($guard === 'web' ? 'favorites.user_id' : 'favorites.member_id', $user->id)
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
        if (!$user) return redirect()->route('login')->with('error','You must be logged in.');

        $col = $guard === 'web' ? 'user_id' : 'member_id';

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
        return back()->with('success','Added to favorites!');
    }

    public function removeFavorite($productId)
    {
        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }

        $query = DB::table('favorites')->where('product_id', $productId);

        if ($guard === 'web') {
            $query->where('user_id', $user->id);
        } else {
            $query->where('member_id', $user->id);
        }

        $query->delete();

        return back()->with('success', 'Removed from favorites.');
    }

    public function orders()
    {
        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }

        $column = $guard === 'web' ? 'user_id' : 'member_id';

        $orders = DB::table('cart')
                    ->where($column, $user->id)
                    ->get();

        return view('user.orders', compact('orders'));
    }

    public function addCompare($id)
    {
        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }

        $compare = session()->get('compare', []);

        if (!in_array($id, $compare)) {
            if (count($compare) >= 3) {
                return back()->with('error', 'You can only compare up to 3 products.');
            }

            $compare[] = $id;
            $compare = array_values($compare);
            session()->put('compare', $compare);
        }

        return back()->with('success', 'Added to comparison list.');
    }

    public function compare()
    {
        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your comparison list.');
        }

        $compareIds = session('compare', []);

        $products = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.*', 'category.name as category_name')
            ->whereIn('products.id', $compareIds)
            ->get();

        return view('user.compare', compact('products'));
    }

    public function removeCompare($id)
    {
        $compare = session()->get('compare', []);
        $compare = array_filter($compare, fn($item) => $item != $id);
        $compare = array_values($compare);

        session()->put('compare', $compare);
        return redirect()->back()->with('success', 'Product removed from comparison!');
    }
}
