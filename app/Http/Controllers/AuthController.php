<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('page.dangky'); // Trả về trang đăng ký
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        // Tạo user mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Dùng Hash::make()
        ]);
    
        // Kiểm tra xem user đã tạo thành công chưa
        if ($user) {
            Auth::login($user);
            return redirect()->route('login.form')->with('success', 'Đăng ký thành công!');
        } else {
            return back()->with('error', 'Đăng ký thất bại, vui lòng thử lại.');
        }
    }
// Hiển thị form đăng nhập
public function showLoginForm()
{
    return view('page.dangnhap'); // Đảm bảo có file login.blade.php
}

// Xử lý đăng nhập
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Lấy user từ database
    $user = User::where('email', $request->email)->first();

    // Debug dữ liệu
    if (!$user) {
        return back()->with('error', 'Email không tồn tại!');
    }

    // Kiểm tra mật khẩu thủ công
    if (!Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Sai mật khẩu!');
    }

    // Đăng nhập bằng Auth
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
    }

    return back()->with('error', 'Email hoặc mật khẩu không đúng!');
}
// Xử lý đăng xuất
public function logout()
{
    Auth::logout();
    return redirect()->route('login.form')->with('success', 'Đã đăng xuất thành công!');
}
}
