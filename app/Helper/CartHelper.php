<?php

namespace App\Helper;

use App\Models\Backend\Color;
use App\Models\Backend\Size;
use Illuminate\Support\Str;

class CartHelper
{
    private $cart;
    private $total_amount;
    private $total_quantity;

    public function __construct()
    {
        $this->cart = session('cart') ? session('cart') : [];
        $this->total_quantity = $this->totalQuantity();
        $this->total_amount = $this->totalAmount();
    }

    public function checkItemExists($product_id, $color, $size)
    {
        foreach ($this->cart as $key => $item) {
            if ($product_id == $item['product_id'] && $color == $item['color'] && $size == $item['size']) {
                return $key;
            }
        }
        return false;
    }

    public function checkUpdateItemExists($rowId, $product_id, $color, $size)
    {
        foreach ($this->cart as $key => $item) {
            if ($product_id == $item['product_id'] && $color == $item['color'] && $size == $item['size'] && $rowId != $key) {
                return $key;
            }
        }
        return false;
    }


    public function add($product, $color, $size, $quantity)
    {
        if (!$quantity || $quantity < 1) {
            $quantity = 1;
        }

        $rowId = Str::random();

        $item = [
            'product_id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'quantity' => $quantity,
            'color' => $color,
            'size' => $size,
            'product' => $product
        ];

        // Check item status
        $check = $this->checkItemExists($product->id, $color, $size);

        if ($check) {
            $this->cart[$check]['quantity'] += $quantity;
        } else {
            $this->cart[$rowId] = $item;
        }

        // Save cart
        session(['cart' => $this->cart]);
    }

    public function update($rowId, $color, $size, $quantity)
    {
        // Check quantity valid
        if ($quantity < 0 || !is_numeric($quantity)) {
            $quantity = $this->cart[$rowId]['quantity'];
        }

        $id_product = $this->cart[$rowId]['product_id'];

        $key_item_exists = $this->checkUpdateItemExists($rowId, $id_product, $color, $size);

        if ($key_item_exists) {
            // Ddd quantity to old product
            $this->cart[$key_item_exists]['quantity'] += $this->cart[$rowId]['quantity'];

            // Remove item in cart array
            unset($this->cart[$rowId]);
        } else {
            // If the item doesn't match any element in cart array => update this item
            $this->cart[$rowId]['size']     = $size;
            $this->cart[$rowId]['color']    = $color;
            $this->cart[$rowId]['quantity'] = $quantity;
        }

        session(['cart' => $this->cart]);
    }

    public function content()
    {
        return $this->cart;
    }

    // Remove item by 'rowId'
    public function remove($rowId)
    {
        if (isset($this->cart[$rowId])) {

            // Remove item in cart array
            unset($this->cart[$rowId]);

            // Save cart
            session(['cart' => $this->cart]);
        }
    }

    // Remove all item
    public function destroy()
    {
        session(['cart' => []]);
    }

    // Total quantity
    public function totalQuantity()
    {
        $total_quantity = 0;

        foreach ($this->cart as $item) {
            $total_quantity += $item['quantity'];
        }

        return $total_quantity;
    }

    public function getTotalQuantity()
    {
        return $this->total_quantity;
    }

    // Total price
    public function totalAmount()
    {
        $total_amount = 0;

        foreach ($this->cart as $item) {
            $total_amount += $item['price'] * $item['quantity'];
        }
        return $total_amount;
    }

    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    public function getColorName($color_id)
    {
        return Color::find($color_id)->name;
    }

    public function getSizeName($size_id)
    {
        return Size::find($size_id)->value;
    }
}
