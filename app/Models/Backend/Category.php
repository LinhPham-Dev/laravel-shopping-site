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

    public function categoryActives()
    {
        return self::where('status', 1)->get();
    }

    public function scopeFeatured($query, $number)
    {
        return self::latest()->take($number)->get();
    }
}
