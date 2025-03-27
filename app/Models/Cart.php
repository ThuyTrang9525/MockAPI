<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cart extends Model
{
   public $items = null;
  public $totalQty = 0;
  public $totalPrice = 0;
  public function __construct($oldCart=null)
  {
    if ($oldCart) {
      $this->items = $oldCart->items;
      $this->totalQty = $oldCart->totalQty;
      $this->totalPrice = $oldCart->totalPrice;
    }
  }
  //Them phan tu vao gio hang                 
  public function add($item, $id, $qty = 1)
{
    $giohang = ['qty' => 0, 'price' => 0, 'item' => $item];

    if ($this->items && array_key_exists($id, $this->items)) {
        $giohang = $this->items[$id];
    }

    $giohang['qty'] += $qty;
    
    // Kiểm tra xem có giá khuyến mãi không
    if ($item->promotion_price > 0) {
        $giohang['price'] = $item->promotion_price * $giohang['qty'];
        $this->totalPrice += $item->promotion_price * $qty;  // Cộng thêm giá của số lượng mới thêm
    } else {
        $giohang['price'] = $item->unit_price * $giohang['qty'];
        $this->totalPrice += $item->unit_price * $qty;  // Cộng thêm giá của số lượng mới thêm
    }

    $this->items[$id] = $giohang;
    $this->totalQty += $qty;
}

  //xóa 1                 
  public function reduceByOne($id)
  {
    $this->items[$id]['qty']--;
    $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
    $this->totalQty--;
    $this->totalPrice -= $this->items[$id]['item']['price'];
    if ($this->items[$id]['qty'] <= 0) {
      unset($this->items[$id]);
    }
  }
  //xóa nhiều                 
  public function removeItem($id)
  {
    $this->totalQty -= $this->items[$id]['qty'];
    $this->totalPrice -= $this->items[$id]['price'];
    unset($this->items[$id]);
  }
}


