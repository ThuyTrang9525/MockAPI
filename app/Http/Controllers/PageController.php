<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Comment;
use App\Models\TypeProduct;
class PageController extends Controller
{
    public function index()
    {
        $slide = Slide::all();
        $newProducts = Product::where('new', 1)->get(); // Lấy sản phẩm mới
        $topProducts = Product::orderBy('unit_price', 'desc')->take(10)->get(); // Lấy 10 sản phẩm có giá cao nhất
        return view('page.trangchu', compact('slide', 'newProducts', 'topProducts'));
    }
				
    public function getLoaiSp($type_id){	
        // $newProducts = Product::where('new', 1)->get(); // Lấy sản phẩm mới
        // $topProducts = Product::orderBy('unit_price', 'desc')->take(10)->get(); // Lấy 10 sản phẩm có giá cao nhất		
        $type_product = TypeProduct::all();	
        $sp_theoloai = Product::where('id_type', $type_id)->get();
        $sp_khac = Product::where('id_type','<>',$type_id)->paginate(3);	
    	return view('page.loai_sanpham',compact('type_product', 'sp_theoloai','sp_khac'));				
    }					
  
    public function getChiTietSanPham($id) {
        $sanpham = Product::with('comments')->findOrFail($id); // Lấy sản phẩm và kèm theo bình luận
        $relatedProducts = $sanpham->relatedProducts();
        $newProducts = $sanpham->newProducts();
        $bestSellers = Product::bestSellers();
        return view('page.chitiet_sanpham', compact('sanpham', 'relatedProducts', 'newProducts', 'bestSellers'));
    }
    
    public function getLienHe(){					
    	return view('page.lienhe');				
    }					
    public function getAbout(){					
    	return view('page.about');				
    }					
    public function getDangKy(){					
    	return view('page.dangky');				
    }					
    public function getDangNhap(){					
    	return view('page.dangnhap');				
    }					
    public function getThanhToan(){					
    	return view('page.thanhtoan');				
    }				
    


    
    public function getAdminAdd()
    {
        return view('pageadmin.formAdd');
    }

    // Xử lý thêm sản phẩm
public function postAdminAdd(Request $request)
{
    $request->validate([
        'inputName' => 'required|string|max:255',
        'inputPrice' => 'required|numeric|min:10000',
        'inputPromotionPrice' => 'nullable|numeric|min:10000',
        'inputUnit' => 'required|string|max:50',
        'inputNew' => 'required|integer|min:0|max:1',
        'inputType' => 'required|string',
        'inputImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'inputDescription' => 'nullable|string',
    ]);

    // Lưu ảnh
    if ($request->hasFile('inputImage')) {
        $image = $request->file('inputImage');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    } else {
        $imageName = null;
    }

    // Thêm sản phẩm vào database
    Product::create([
        'name' => $request->inputName,
        'unit_price' => $request->inputPrice,
        'promotion_price' => $request->inputPromotionPrice ?? 0,
        'unit' => $request->inputUnit,
        'new' => $request->inputNew,
        'id_type' => $request->inputType,
        'image' => $imageName,
        'description' => $request->inputDescription,
    ]);

    return redirect()->route('admin.index')->with('success', 'Thêm sản phẩm thành công');
}

    public function postAdminDelete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
        return $this->getIndexAdmin();
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function getAdminEdit($id)
    {
        $product = Product::find($id);
        return view('pageadmin.formEdit')->with('product', $product);
    }

    // Xử lý cập nhật sản phẩm
    public function postAdminEdit(Request $request)
    {
        $id = $request->editId;
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
        }
    
        // Cập nhật thông tin sản phẩm
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->description = $request->description;
        $product->unit = $request->unit;
        $product->new = $request->new;
    
        // Kiểm tra xem có file ảnh mới không
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('source/source/image/product'), $imageName);
            $product->image = $imageName; // Cập nhật ảnh mới
        }
    
        $product->save(); // Lưu thay đổi vào database
    
        return redirect()->route('admin.index')->with('success', 'Cập nhật sản phẩm thành công');
    }
    
    
    // Hiển thị danh sách sản phẩm
    public function getIndexAdmin()
    {
        $products = Product::all();
       
        return view('pageadmin.admin', compact('products'));
    }
}					
					

