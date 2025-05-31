<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getlogin() {
        if (Auth::check()) {
            return redirect()->route('admin.member.index');
        }
        return view('admin.login');
    }

    public function postlogin(Request $request) {
    // Bỏ qua hoàn toàn Auth::attempt()
    // Tự động "fake" login luôn
    $request->session()->regenerate();

    // Có thể gán 1 user giả nếu cần:
    Auth::loginUsingId(1); // login với user có id=1

    return redirect()->route('admin.member.index');
}


    public function logout () {
        Auth::logout();

        return redirect()->route('getlogin');
    }
}
