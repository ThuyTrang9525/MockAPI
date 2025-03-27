<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    
    public function index()
{
    return response()->json(Product::all(), 200);
}

    // Tạo sản phẩm mới
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Lấy thông tin một sản phẩm theo ID
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
        return response()->json($product, 200);
    }

    // Cập nhật sản phẩm theo ID
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
        $product->update($request->all());
        return response()->json($product, 200);
    }

    // Xóa sản phẩm theo ID
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Sản phẩm đã bị xóa'], 200);
    }
}


























//     public function __construct()
//     {
//         $this->apiUrl = env('MOCK_API_URL');
//     }
// // Lấy danh sách sản phẩm từ Mock API
//     public function index()
//     {
//         $response = Http::get($this->apiUrl);
//         if ($response->successful()) {
//             $products = $response->json();
//             return view('products.index', compact('products'));
//         } else {
//         return back()->withErrors(['message' => 'Không thể lấy dữ liệu từ Mock API']);
//         }
//     }
//     public function store(Request $request)
//     {
//         $response = Http::post($this->apiUrl, [
//             'name'      => $request->input('name'),
//             'avatar'    => $request->input('avatar'),
//             'createdAt' => now()->toISOString(),
//         ]);
    
//         if ($response->successful()) {
//             return redirect('/products')->with('success', 'User added successfully!');
//         } else {
//             return back()->withErrors(['message' => 'Failed to add user.']);
//         }
//     }
//     // Hiển thị form chỉnh sửa sản phẩm
//         public function edit($id)
//         {
//             $response = Http::get("$this->apiUrl/$id");
//             if ($response->successful()) {
//             $product = $response->json();
//             return view('products.edit', compact('product'));
//             }
//             return redirect()->route('products.index')->withErrors(['message' => 'Không tìm thấy sản phẩm']);
//         }
//         // Cập nhật sản phẩm
//         public function update(StoreProductRequest $request, $id)
//         {
//             $response = Http::put("$this->apiUrl/$id", $request->validated());
//             if ($response->successful()) {
//                 return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật!');
//             }
//             return back()->withErrors(['message' => 'Lỗi khi cập nhật sản phẩm']);
//         }

//         // Xóa sản phẩm
//         public function destroy($id)
//         {
//             $response = Http::delete("$this->apiUrl/$id");
//             if ($response->successful()) {
//                 return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa!');
//             }
//             return back()->withErrors(['message' => 'Lỗi khi xóa sản phẩm']);
//         }


