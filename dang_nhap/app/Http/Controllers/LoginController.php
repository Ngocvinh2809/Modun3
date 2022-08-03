<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Raw;

use function PHPSTORM_META\exitPoint;

class LoginController extends Controller
{
    public function show_register()
    {
        return view('sign_in.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password_confirmation.required' => 'Bạn chưa nhập lại mật khẩu',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }
    public function showform()
    {
        if(Auth::check()){
            return redirect()->route('customer.index');
        }else{

            return view('sign_in.login');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Nhập email',
            'password.required' => 'Nhập mật khẩu',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            return redirect()->route('product.index');
        }

        return redirect()->back();
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
       
        return redirect()->route('login');
    }
}
