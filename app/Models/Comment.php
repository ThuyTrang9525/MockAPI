<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments'; // Đảm bảo tên bảng đúng

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product'); // Đổi 'product_id' thành 'id_product'
    }
}

