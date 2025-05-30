<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(){
        $result = DB::table('members')->orderBy('id')->paginate(5);
        if ($key = request()->key){
            $result = DB::table('members')->orderBy('id')
            ->where('email','like','%' . $key . '%')
            ->paginate(100);
        }
        return view('admin.member.index',['members' => $result])->with('i',(request()->input('page',1)-1)*5);
    }
    
    public function create(){
        return view('admin.member.create');
    }
    
    public function store(StoreRequest $request){
        $data = $request->except('_token','password_confirmation');
        $data['password'] = bcrypt($data['password']);
        $data['created_at'] = new \DateTime();
        DB::table('members')->insert($data);
        return redirect()->route('admin.member.index')->with('success','Add Success');
    }
    
    public function edit($id){
        $result = DB::table('members')->where('id',$id)->first();
        $edit_myself = null;
        if ( Auth::user()->id == $id) {
            $edit_myself = true;
        } else {
            $edit_myself = false;
        }
        if (Auth::user()->id != 1 && ($id == 1 || ( $result->level == 1 && $edit_myself == false))){
            return redirect()->route('admin.member.index')->with('error','Not Enough Permission To edit');
        }
        return view('admin.member.edit',['member'=>$result]);
    }

    public function update(UpdateRequest $request,$id){
        $data = $request->except('_token','password_confirmation','password','email');
        if(!empty($request-> password)){
            $data['password'] = bcrypt($request-> password);
        }
        $data['updated_at']  = new \DateTime();
        DB::table('members')->where('id',$id)->update($data);
        return redirect()->route('admin.member.index')->with('success','Add Success');
    }

    public function delete($id){
        $result = DB::table('members')->where('id',$id)->first();
        if(($id == 1) || Auth::user()->id != 1 &&  $result->level == 1){
            return redirect()->route('admin.member.index')->with('error','Not Enough Permission To Delete');
        }
        DB::table('members')->where('id',$id)->delete();
        return redirect()->route('admin.member.index')->with('success','Delete Success');
    }
}
