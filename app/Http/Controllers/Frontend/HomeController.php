<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\Size;
use App\Models\Order;
use App\Models\ProductReview;
use Illuminate\Http\Request;

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

        $products = Product::productByCategory($slug)->searchByColor()->searchBySize()->sortByPrice()->sortBy()->paginate(6);
        $categories = Category::all();
        $sizes      = Size::all();
        $colors     = Color::all();

        return view('frontend.pages.product', compact('products', 'categories', 'sizes', 'colors'));
    }

    public function product($slug)
    {

        $product = Product::where('slug', $slug)->first();

        $reviews = ProductReview::where('product_id', $product->id)->get();

        $total_reviews = $reviews->count();

        $rating_avg = $reviews->avg('rating');

        $related_products = Product::related($product);

        return view('frontend.pages.product_detail', compact('product', 'related_products', 'reviews', 'rating_avg', 'total_reviews'));
    }

    public function review(Request $request)
    {

        /**
         *  Check user was bought product.
         *
         */

        // $orders = Order::where('user_id', $request->user_id)->get();

        // function FunctionName($orders, $request)
        // {
        //     foreach ($orders as $order) {
        //         foreach ($order->orderDetails() as $order_detail) {
        //             if ($order_detail->product->id == $request->product_id) {
        //                 return true;
        //             }
        //         }
        //     }

        //     return false;
        // }

        $check_review_exits = ProductReview::where($request->only('user_id', 'product_id'))->first();

        if ($check_review_exits) {
            // Update review
            $check_review_exits->update($request->only('rating', 'message'));

            return redirect()->back()->with('success', 'Your comment has been updated !');
        } else {
            // Add new review
            $review = ProductReview::add($request);

            if ($review) {
                return redirect()->back()->with('success', 'Your comment  has been added !');
            } else {
                return redirect()->back()->with('error', 'Your comment have a problem !');
            }
        }
    }
}
