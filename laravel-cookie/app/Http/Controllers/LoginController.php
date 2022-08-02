<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function showFormLogin(Request $request)
    {
        $email = '';
        $password = '';
        if ($request->cookie('email')) {
            $email = $request->cookie('email');
            $password = $request->cookie('password');
        }
        return view('login', compact('email', 'password'));
    }
    function login(Request $request)
    {
        $data = $request->only(['email', 'password']);
        if (Auth::attempt($data)) {
            $cookie = cookie('email', $request->email);
            $cookiePassword = cookie('password', $request->password);
            // $request->session()->push('login', true);
            return redirect()->route('home.index')->cookie($cookie)->cookie($cookiePassword);

        }
        // $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
        // $request->session()->flash('login-fail', $message);
        return back();
        
    }
    
}
