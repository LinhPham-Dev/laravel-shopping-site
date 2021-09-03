<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'slug', 'image', 'status'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    // Check the product number belongs to the category
    public function productOfCategories()
    {
        return $this->hasMany(Product::class);
    }

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

    public function categoryActives()
    {
        return self::where('status', 1)->get();
    }

    public function scopeFeatured($query, $number)
    {
        return self::latest()->take($number)->get();
    }
}
