<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = DB::table('products')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->get();

        return view('user.search_results', compact('products', 'query'));
    }
}
