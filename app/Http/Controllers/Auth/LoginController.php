<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('logout'));
        }
        return view('Auth.Login');
    }


    public function process(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'min:4'],
            'password' => ['required', 'min:5'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }
        return back()->with('statusErr', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'))->with('status', 'Berhasil Logout');
    }
}
