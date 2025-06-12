<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::table('reviews')->insert([
            'product_id' => $request->product_id,
            'content' => $request->content,
            'created_at' => now(),
        ]);

        return redirect()->route('index')->with('success', 'Thank you for your review!');
    }
}
