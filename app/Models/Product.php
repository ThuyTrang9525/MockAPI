<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image', 'unit', 'new'];
    protected $primaryKey = 'id';

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_product', 'id');
    }
    public function typeProduct()
    {
        return $this->belongsTo('App\Models\TypeProduct', 'id_type', 'id');
    }

    public function relatedProducts()
    {
        return $this->where('id_type', $this->id_type)->where('id', '!=', $this->id)->limit(3)->get();
    }

    public function newProducts()
    {
        return $this->orderBy('created_at', 'desc')->limit(4)->get();
    }
    public static function bestSellers($limit = 4) {
        return self::join('bill_detail', 'products.id', '=', 'bill_detail.id_product')
            ->select('products.id', 'products.name', 'products.image', 'products.unit_price')
            ->selectRaw('SUM(bill_detail.quantity) as total_sold')
            ->groupBy('products.id', 'products.name', 'products.image', 'products.unit_price')
            ->orderByDesc('total_sold')
            ->limit($limit)
            ->get();
    }
    

}
