<?php

namespace App\Models;

use App\Helper\CartHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use App\Models\Backend\Color;
use App\Models\Backend\Size;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'color_id', 'size_id', 'quantity', 'price'];

    public function scopeAddOrderDetail($query, $order_id)
    {
        $cart = new CartHelper();

        foreach ($cart->content() as $item) {
            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $item['product_id'],
                'color_id' => $item['color'],
                'size_id' => $item['size'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        $cart->destroy();
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
