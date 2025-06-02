<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getlogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.member.index');
        }

        return view('admin.login');
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
            return redirect()->route('admin.member.index');
        }
        // If authentication fails, redirect back with an error message
    return redirect()->route('getlogin')->with('error','Email or password is incorrect');
}



    public function logout () {
        Auth::logout();

        return redirect()->route('getlogin');
    }
}
