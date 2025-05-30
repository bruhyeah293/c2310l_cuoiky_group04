<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
class CategoryController extends Controller
{
    public function index(){
        $result = DB::table('category')->orderBy('id')->get();
        return view('admin.category.index',['categorys' => $result]);
        
    }
    
    public function create(){
        $result = DB::table('category')->orderBy('id')->get();
        return view('admin.category.create',['categorys' => $result]);
    }
    
    public function store(StoreRequest $request){
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('category')->insert($data);
        return redirect()->route('admin.category.index')->with('success','Create Category Success');
    }
    
    public function edit($id){
        $result = DB::table('category')->where('id',$id)->first();
        $results= DB::table('category')->where('id','<>',$id) ->orderBy('id')->get();
        return view('admin.category.edit',['category'=>$result,'categorys'=> $results]);
    }

    public function update(UpdateRequest $request,$id){
        $data = $request->except('_token');
        DB::table('category')->where('id',$id)->update($data);
        return redirect()->route('admin.category.index')->with('success','Edit Category Success');
    }

    public function delete($id){
        $data= DB::table('category')->orderBy('id')->get();
        foreach($data as $value){
            if($id==$value->parent){
                return redirect()->route('admin.category.index')->with('error','Cannot Delete Category Has Children'); 
            }
        }
        $data_deleted= DB::table('products')->where('category_id',$id)->first();
        if(!empty($data_deleted->image)){
            $url_image_deleted = public_path('images/'.$data_deleted->image);
            if(file_exists($url_image_deleted)){
                unlink($url_image_deleted);
            }
        }
        DB::table('products')->where('category_id',$id)->delete();
        DB::table('category')->where('id',$id)->delete();
        return redirect()->route('admin.category.index')->with('success','Delete Success');
    }
}
