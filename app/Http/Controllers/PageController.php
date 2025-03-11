<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
class PageController extends Controller
{
    public function index()
    {
        $slide = Slide::all();
        $newProducts = Product::where('new', 1)->get(); // Lấy sản phẩm mới
        $topProducts = Product::orderBy('unit_price', 'desc')->take(10)->get(); // Lấy 10 sản phẩm có giá cao nhất
        return view('page.trangchu', compact('slide', 'newProducts', 'topProducts'));
    }
				
    public function getLoaiSp(){	
        $newProducts = Product::where('new', 1)->get(); // Lấy sản phẩm mới
        $topProducts = Product::orderBy('unit_price', 'desc')->take(10)->get(); // Lấy 10 sản phẩm có giá cao nhất				
    	return view('page.loai_sanpham',compact('newProducts', 'topProducts'));				
    }					
  
    public function getChiTietSanPham($id) {
        $sanpham = Product::find($id);
        $relatedProducts = $sanpham->relatedProducts();
        $newProducts = $sanpham->newProducts();
        return view('page.chitiet_sanpham', compact('sanpham', 'relatedProducts', 'newProducts'));
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
}					
					

