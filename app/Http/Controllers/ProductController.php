<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreProductRequest;
class ProductController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('MOCK_API_URL');
    }
    public function updateUserInfo()
    {
        $response = Http::put("https://656ca88ee1e03bfd572e9c16.mockapi.io/products/32", [
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
    // Hiển thị form chỉnh sửa sản phẩm
        public function edit($id)
        {
            $response = Http::get("$this->apiUrl/$id");
            if ($response->successful()) {
            $product = $response->json();
            return view('products.edit', compact('product'));
            }
            return redirect()->route('products.index')->withErrors(['message' => 'Không tìm thấy sản phẩm']);
        }
        // Cập nhật sản phẩm
        public function update(StoreProductRequest $request, $id)
        {
            $response = Http::put("$this->apiUrl/$id", $request->validated());
            if ($response->successful()) {
                return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật!');
            }
            return back()->withErrors(['message' => 'Lỗi khi cập nhật sản phẩm']);
        }

        // Xóa sản phẩm
        public function destroy($id)
        {
            $response = Http::delete("$this->apiUrl/$id");
            if ($response->successful()) {
                return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa!');
            }
            return back()->withErrors(['message' => 'Lỗi khi xóa sản phẩm']);
        }


}
