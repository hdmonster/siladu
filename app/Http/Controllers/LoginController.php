<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('admin.auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
        $cred = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->with('authError', 'Wrong username or password!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
