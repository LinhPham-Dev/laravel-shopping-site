<?php

namespace App\Models\Backend;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductReview;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'category_id', 'slug', 'price', 'sale_price', 'status', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    // Check the product number belongs to the category
    public function orderOfProduct()
    {
        return $this->belongsToMany(Order::class, OrderDetail::class);
    }

    // *** Query *** \\
    public function scopeSearch($query)
    {

        if (request()->name) {
            $query->where('name', 'LIKE', '%' . request()->name . '%');
        }

        if (request()->status != null) {
            $query->where('status', request()->status);
        }
        return $query;
    }

    public function scopeSearchByColor($query)
    {
        if (request()->color) {
            $products = Product::join('product_colors', 'products.id', '=', 'product_colors.product_id')
                ->select('products.*')
                ->where('product_colors.color_id', request()->color);

            return $products;
        }
    }

    public function scopeSearchBySize($query)
    {
        if (request()->size) {
            $products = Product::join('product_sizes', 'products.id', '=', 'product_sizes.product_id')
                ->select('products.*')
                ->where('product_sizes.size_id', request()->size);

            return $products;
        }
    }

    public function scopeSortBy($query)
    {
        if (request()->orderby) {
            switch (request()->orderby) {
                case 'latest':
                    $query->latest();
                    break;
                case 'price-low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'name-az':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name-za':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price-high':
                    $query->orderBy('price', 'asc');
                    break;
                default:
                    $query->oldest();
                    break;
            }
        }
    }

    public function scopeSortByPrice($query)
    {
        if (request()->from > 0 && request()->to > 0 && request()->from < request()->to) {
            $query->where('price', '>=', request()->from)->where('price', '<=', request()->to);

            return $query;
        }
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

    // Review of product
    public function reviews()
    {
        return $this->belongsToMany(ProductReview::class);
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
            $query = Product::where('category_id', $category->id);
        }

        return $query;
    }

    public function scopeRelated($query, $product)
    {
        $category_id = $product->category->id;
        return Product::where('category_id', $category_id)->where('id', '!=', $product->id)->take(4)->get();
    }
}
