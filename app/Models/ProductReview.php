<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'rating', 'message', 'status'];

    public function scopeAdd($query, $request)
    {
        $review = ProductReview::create([
            'user_id' => $request->user_id,
            'product_id' => $request->user_id,
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        return $review;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
