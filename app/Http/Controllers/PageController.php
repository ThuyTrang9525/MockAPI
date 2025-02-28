<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        return view('page.trangchu');		
    }
    					
    public function getLoaiSp(){					
    	return view('page.loai_sanpham');				
    }					
    public function getChiTiet(){					
    	return view('page.chitiet_sanpham');				
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
					

