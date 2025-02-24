<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ProductController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('MOCK_API_URL');
    }
    public function updateUserInfo()
    {
        $response = Http::put("https://656ca88ee1e03bfd572e9c16.mockapi.io/products/13", [
            'name'   => 'Trang',
            'avatar' => 'https://cdn.kona-blue.com/upload/kona-blue_com/post/images/2024/08/14/363/hinh-anh-chibi-nu-cute-12.jpg',
        ]);

        if ($response->successful()) {
            return "Cập nhật thành công!";
        } else {
            return "Lỗi cập nhật!";
        }
    }
// Lấy danh sách sản phẩm từ Mock API
    public function index()
    {
        $response = Http::get($this->apiUrl);
        if ($response->successful()) {
            $products = $response->json();
            return view('products.index', compact('products'));
        } else {
        return back()->withErrors(['message' => 'Không thể lấy dữ liệu từ Mock API']);
        }
    }
    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, [
            'name'      => $request->input('name'),
            'avatar'    => $request->input('avatar'),
            'createdAt' => now()->toISOString(),
        ]);
    
        if ($response->successful()) {
            return redirect('/products')->with('success', 'User added successfully!');
        } else {
            return back()->withErrors(['message' => 'Failed to add user.']);
        }
    }

}
