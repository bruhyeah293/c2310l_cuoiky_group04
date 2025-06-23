<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index(){
        $result = DB::table('category')->orderBy('id')->get();
        return view('admin.category.index', ['categorys' => $result]);
    }

    public function create(){
        $result = DB::table('category')->orderBy('id')->get();
        return view('admin.category.create', ['categorys' => $result]);
    }

    public function store(StoreRequest $request){
        $data = $request->except('_token');
        $data['created_at'] = now();
        DB::table('category')->insert($data);
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }

    public function edit($id){
        $category = DB::table('category')->where('id', $id)->first();
        $otherCategories = DB::table('category')
            ->where('id', '<>', $id)
            ->orderBy('id')->get();
        return view('admin.category.edit', [
            'category' => $category,
            'categorys' => $otherCategories
        ]);
    }

    public function update(UpdateRequest $request, $id){
        $data = $request->except('_token');
        $data['updated_at'] = now();
        DB::table('category')->where('id', $id)->update($data);
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    public function delete($id){
        $category = DB::table('category')->where('id', $id)->first();
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Category not found.');
        }

        // Prevent deletion if the category has children
        $hasChildren = DB::table('category')->where('parent', $id)->exists();
        if ($hasChildren) {
            return redirect()->route('admin.category.index')->with('error', 'Cannot delete category that has subcategories.');
        }

        // Delete associated products and their images
        $products = DB::table('products')->where('category_id', $id)->get();
        foreach ($products as $product) {
            if (!empty($product->image)) {
                $imagePath = public_path('images/' . $product->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        DB::table('products')->where('category_id', $id)->delete();
        DB::table('category')->where('id', $id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
}
