<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    public function index(Request $request) {
        $query = DB::table('category')
            ->join('products', 'products.category_id', '=', 'category.id')
            ->select('category.name as cname', 'products.image', 'products.name', 'products.price', 'products.quantity', 'products.intro', 'products.status', 'products.featured', 'products.id');

        if ($request->filled('keyc')) {
            $query->where(function($q) use ($request) {
                $q->where('products.name', 'LIKE', '%' . $request->keyc . '%')
                ->orWhere('products.price', 'LIKE', '%' . $request->keyc . '%');
            });
        }

        $result = $query->paginate(5);

        return view('admin.product.index', ['products' => $result])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create(){
        $result = DB::table('category')->orderBy('id')->get();
        return view('admin.product.create',['categorys' => $result]);
    }

    public function store(StoreRequest $request){
        $data = $request->except('_token','image');
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        $data['created_at'] = now();
        DB::table('products')->insert($data);
        return redirect()->route('admin.product.index')->with('success','Create Product Success');
    }


    public function edit($id){
        $result = DB::table('products')->where('id',$id)->first();
        $results = DB::table('category')->orderBy('id')->get();
        return view('admin.product.edit',['product'=>$result,'categorys' => $results]);
    }

    public function update(UpdateRequest $request,$id){
        $data = $request->except('_token','image');
        $data['updated_at']  = new \DateTime();
        if (!empty($request->image)) {
            $data_old = DB::table('products')->where('id', $id)->first();
            $url_image_old_path = public_path('images/'. $data_old->image);
            if (file_exists($url_image_old_path)) {
                unlink($url_image_old_path);
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        DB::table('products')->where('id',$id)->update($data);
        return redirect()->route('admin.product.index')->with('success','Edit Success');
    }

    public function delete($id){
        $data_deleted = DB::table('products')->where('id',$id)->first();
        if (!empty($data_deleted)){
            $url_image_deleted = public_path('images/'. $data_deleted->image);
            if(file_exists($url_image_deleted)) unlink($url_image_deleted);
        }
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Delete Product Success');
    }
}

