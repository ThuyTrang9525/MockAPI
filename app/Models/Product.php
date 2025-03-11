<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

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
}
