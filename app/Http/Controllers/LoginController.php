<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\User;
use App\Models\Member;

class LoginController extends Controller
{
    /* ---------- FORM ---------- */
    public function getLogin() { return view('auth.login'); }

    /* ---------- LOGIN ---------- */
    public function postLogin(Request $request)
    {
        // validate trước
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Thử các guard theo thứ tự
        foreach (['web' => User::class, 'member' => Member::class] as $guard => $model) {
            if (Auth::guard($guard)->attempt($credentials, $request->filled('remember'))) {
                // login OK
                session(['guard' => $guard]);

                $user = Auth::guard($guard)->user();
                return $user->level == 1
                       ? redirect()->route('admin.member.index')
                       : redirect()->intended(route('index'));
            }
        }

        return back()->with('error', 'Email hoặc mật khẩu không đúng.');
    }

    /* ---------- REGISTER (user => guard web) ---------- */
    public function getRegister() { return view('auth.register'); }

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
                         ->with('success', 'Đăng ký thành công! Hãy đăng nhập.');
    }

    /* ---------- LOGOUT ---------- */
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
