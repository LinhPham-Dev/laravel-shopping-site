<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'category_id', 'slug', 'price', 'sale_price', 'status', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    // *** Query *** \\
    public function scopeSearch($query)
    {
        if (request()->key) {
            $query = $query->where('name', 'LIKE', '%' . request()->key . '%');
        }

        return $query;
    }

    // Get the category of product
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Get all colors
    public function productColorsExist()
    {
        return $this->hasMany(ProductColor::class);
    }

    // Get all sizes
    public function productSizesExist()
    {
        return $this->hasMany(ProductSize::class);
    }

    // Get the color of product
    public function productColors()
    {
        return $this->belongsToMany(Color::class, ProductColor::class);
    }

    // Get the size of product
    public function productSizes()
    {
        return $this->belongsToMany(Size::class, ProductSize::class);
    }

    // Get image detail
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    // *** Method Query data *** \\
    public function getAllProducts()
    {
        return Product::all();
    }

    public function scopeBestSellers($query, $number)
    {
        return Product::all()->random($number);
    }


    public function scopeOurFeatured($query, $number)
    {
        return Product::all()->random($number);
    }

    public function scopeSaleProducts($query, $number)
    {
        return Product::where('sale_price', '>', 0)->take($number)->get();
    }

    public function scopeLatestProducts($query, $number)
    {
        return Product::latest()->take($number)->get();
    }

    public function scopeBestOfTheWeek($query, $number)
    {
        return Product::all()->random($number);
    }

    public function scopePopular($query, $number)
    {
        return Product::where('price', '>', 0)->take($number)->get();
    }

    public function scopeProductByCategory($query, $slug)
    {
        if ($slug) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->paginate(9);
            return $products;
        }

        $products = Product::paginate(9);

        return $products;
    }

    public function scopeRelated($query, $product)
    {
        $category_id = $product->category->id;
        return Product::where('category_id', $category_id)->where('id', '!=', $product->id)->take(4)->get();
    }
}
