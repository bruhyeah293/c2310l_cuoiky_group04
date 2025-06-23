<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\User;
use App\Models\Member;

class LoginController extends Controller
{
    /* ---------- SHOW LOGIN FORM ---------- */
    public function getLogin() {
        return view('auth.login');
    }

    /* ---------- HANDLE LOGIN ---------- */
    public function postLogin(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Try each guard in order
        foreach (['web' => User::class, 'member' => Member::class] as $guard => $model) {
            if (Auth::guard($guard)->attempt($credentials, $request->filled('remember'))) {
                // Login successful
                session(['guard' => $guard]);

                $user = Auth::guard($guard)->user();
                return $user->level == 1
                    ? redirect()->route('admin.dashboard')
                    : redirect()->intended(route('index'));
            }
        }

        return back()->with('error', 'Incorrect email or password.');
    }

    /* ---------- SHOW REGISTER FORM (user => web guard) ---------- */
    public function getRegister() {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'level'    => 2,
        ]);

        return redirect()->route('login')
                         ->with('success', 'Registration successful! Please log in.');
    }

    /* ---------- HANDLE LOGOUT ---------- */
    public function logout()
    {
        $guard = session('guard', 'web');
        Auth::guard($guard)->logout();

        session()->forget('guard');
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
}
