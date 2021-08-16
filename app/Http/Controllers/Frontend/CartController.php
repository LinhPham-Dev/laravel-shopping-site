<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     *
     * protected $cart
     * protected $cart;

     * public function __construct(CartHelper $cart) {
     *     $this->cart = $cart;
     * }
     */

    public function show(CartHelper $cart)
    {
        return view('frontend.pages.cart', compact('cart'));
    }

    public function add(Request $request, CartHelper $cart)
    {
        $product = Product::find($request->id);

        $cart->add($product, $request->color, $request->size, $request->quantity);

        return redirect()->route('cart.show')->with('success', 'The product has been added to cart !');
    }

    public function update(Request $request, CartHelper $cart)
    {
        $size     = $request->size;
        $color    = $request->color;
        $rowId    = $request->rowId;
        $quantity = $request->quantity;

        // Call method update
        $cart->update($rowId, $color, $size, $quantity);

        return redirect()->back()->with('success', 'The product has been updated !');
    }


    public function remove($rowId, CartHelper $cart)
    {
        $cart->remove($rowId);

        return redirect()->back()->with('success', 'Remove cart item successfully !');
    }

    public function destroy(CartHelper $cart)
    {
        $cart->destroy();

        return redirect()->back()->with('success', 'Remove all item successfully !');
    }
}
