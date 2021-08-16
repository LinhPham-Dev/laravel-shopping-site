<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\Size;


class HomeController extends Controller
{
    public function index()
    {
        $popular          = Product::popular(3);

        $categories       = Category::featured(4);

        $best_sellers     = Product::bestSellers(6);

        $our_featured     = Product::ourFeatured(5);

        $sale_products    = Product::saleProducts(3);

        $latest_products  = Product::latestProducts(3);

        $best_of_the_week = Product::bestOfTheWeek(3);

        return view('frontend.index', compact('categories', 'best_sellers', 'our_featured', 'sale_products', 'latest_products', 'best_of_the_week', 'popular'));
    }

    public function category($slug = '')
    {

        $products = Product::productByCategory($slug);
        $categories = Category::all();
        $sizes      = Size::all();
        $colors     = Color::all();

        return view('frontend.pages.product', compact('products', 'categories', 'sizes', 'colors'));
    }

    public function product($slug)
    {

        $product = Product::where('slug', $slug)->first();

        $related_products = Product::related($product);

        return view('frontend.pages.product_detail', compact('product', 'related_products'));
    }

}
