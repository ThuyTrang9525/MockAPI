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
    // public function store(Request $request)
    // {
    //     $product = Product::create($request->all());
    //     return response()->json($product, 201);
    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'unit_price' => 'required|numeric',
            'promotion_price' => 'nullable|numeric',
            'unit' => 'required|string|max:50',
            'new' => 'required|integer|min:0|max:1',
            'id_type' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Lấy tên gốc của file ảnh
            
            // Lưu ảnh vào thư mục public/source/image/product
            $image->move(public_path('source/image/product'), $imageName); 
        }
    
        // Tạo sản phẩm mới
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'promotion_price' => $request->promotion_price ?? 0,
            'unit' => $request->unit,
            'new' => $request->new,
            'id_type' => $request->id_type,
            'image' => $imageName,  // Lưu tên ảnh vào database (không cần đường dẫn)
        ]);
    
        return response()->json(['message' => 'Product added successfully', 'product' => $product]);
    }
    
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Validation dữ liệu đầu vào
        $request->validate([
            'editName' => 'required|string|max:255',
            'editDescription' => 'nullable|string',
            'editPrice' => 'required|numeric',
            'editPromotionPrice' => 'nullable|numeric',
            'editUnit' => 'required|string|max:50',
            'editNew' => 'required|integer|min:0|max:1',
            'editType' => 'required|integer',
            'editImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Cập nhật các trường của sản phẩm
        $product->name = $request->editName;
        $product->description = $request->editDescription;
        $product->unit_price = $request->editPrice;
        $product->promotion_price = $request->editPromotionPrice ?? 0;
        $product->unit = $request->editUnit;
        $product->new = $request->editNew;
        $product->id_type = $request->editType;
    
        // Nếu có file ảnh được gửi lên, lưu ảnh mới
        if ($request->hasFile('editImage')) {
            // Xóa ảnh cũ (nếu có)
            if ($product->image) {
                $oldImagePath = public_path('source/image/product/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);  // Xóa ảnh cũ
                }
            }
    
            // Lấy tên ảnh mới và di chuyển vào thư mục public
            $image = $request->file('editImage');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('source/image/product'), $imageName);
    
            // Cập nhật đường dẫn ảnh mới vào database
            $product->image = $imageName;
        }
    
        // Lưu sản phẩm đã cập nhật vào database
        $product->save();
    
        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
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
    // public function update(Request $request, $id)
    // {
    //     $product = Product::find($id);
    //     if (!$product) {
    //         return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
    //     }
    //     $product->update($request->all());
    //     return response()->json($product, 200);
    // }

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


