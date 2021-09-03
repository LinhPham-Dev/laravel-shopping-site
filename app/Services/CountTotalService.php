<?php

namespace App\Services;

use App\Models\Backend\Category;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\Size;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 *
 */
class CountTotalService
{

    public function totalProduct()
    {
        return Product::all()->count();
    }

    public function totalCategory()
    {
        return Category::all()->count();
    }

    public function totalOrder()
    {
        return Order::all()->count();
    }

    public function totalColor()
    {
        return Color::all()->count();
    }

    public function totalSize()
    {
        return Size::all()->count();
    }

    public function totalAccount()
    {
        return User::all()->count();
    }

    public function totalBanner()
    {
        return Category::all()->count();
    }
}
