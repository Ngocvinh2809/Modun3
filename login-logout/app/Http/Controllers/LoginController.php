<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'username'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('login');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        // Lấy thông tin đang nhập từ request gửi lên từ trình duyệt
        $username = $request->inputUsername;
        $password = $request->inputPassword;
        

        // Kiểm tra thông tin đăng nhập
        if ($username == 'admin' && $password == '123456') {

            //Nếu thông tin đăng nhập chính xác, Tạo một Session xác nhận đăng nhập thành công
            $request->session()->push('login', true);
           
            // $value = $request->session()->put($username);
            // $value = $request->session()->get($username);
            // Đi đến route show.blog, để chuyển hướng người dùng đến trang blog
            return view('blog')                                   ;
        }

        // Nếu thông tin đăng nhập không chính xác, gán thông báo vào Session
        // $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
        // $request->session()->flash('login-fail', $message);

        //Quay trở lại trang đăng nhập
        return view('login');
    }
}
