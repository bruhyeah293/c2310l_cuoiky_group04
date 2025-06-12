<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getlogin() {
    return view('auth.login'); // Hiển thị trang đăng nhập
}

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->level == 1) {
                return redirect()->route('admin.member.index');
            } elseif (Auth::user()->level == 2) {
                return redirect()->route('index');
            }

            Auth::logout();
            return redirect()->route('postlogin')->with('error', 'Unauthorized user level.');
        }

        return redirect()->route('postlogin')->with('error', 'Email or password is incorrect');
    }



    public function logout () {
        Auth::logout();

        return redirect()->route('login');
    }
}
