<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('page.shopping_cart'); // Đảm bảo tên view đúng với file blade.php
    }
}
