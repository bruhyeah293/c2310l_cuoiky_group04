<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $product_id = $request->product_id;
        return view('user.review_form', compact('product_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'content' => 'required|string|max:1000',
        ]);

        $guard = session('guard', 'web');
        $user = Auth::guard($guard)->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để gửi đánh giá.');
        }

        $data = [
            'product_id' => $request->product_id,
            'content'    => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        if ($guard === 'web') {
            $data['user_id'] = $user->id;
        } else {
            $data['member_id'] = $user->id;
        }

        DB::table('reviews')->insert($data);

        return redirect()->route('index')->with('success', 'Thank you for your review!');
    }

}
