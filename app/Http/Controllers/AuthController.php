<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
        // 📌 Hiển thị form đăng ký
        public function getRegister() {
            return view('page.dangky'); // View đăng ký
        }
    
        // 📌 Xử lý đăng ký
        public function postRegister(Request $request) {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
    
            return redirect()->route('login.form')->with('success', 'Đăng ký thành công! Hãy đăng nhập.');
        }
    
        // 📌 Hiển thị form đăng nhập
        public function getLogin() {
            return view('page.dangnhap'); // View đăng nhập
        }
    
        // 📌 Xử lý đăng nhập
        public function postLogin(Request $request) {
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                return redirect()->route('trang-chu')->with('success', 'Đăng nhập thành công!');
            } else {
                return back()->with('error', 'Đăng nhập thất bại. Vui lòng kiểm tra lại email và mật khẩu.');
            }
        }
    
        // 📌 Đăng xuất
        public function Logout() {
            Auth::logout();
            return redirect()->route('login.form')->with('success', 'Đã đăng xuất thành công.');
        }
    }
    