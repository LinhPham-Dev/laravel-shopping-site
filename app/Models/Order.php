<?php

namespace App\Models;

use App\Helper\CartHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        // 'payment_methods',
        // 'shipping_unit',
        'token',
        'note',
        'status',
        'total_amount'
    ];

    public function scopeAddOrder($query, $request)
    {
        $cart = new CartHelper();

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'phone' => $request->phone,
            'address' => $request->address1,
            'payment_methods' => $request->payment_methods,
            'shipping_unit' => $request->shipping_unit,
            'token' => Str::random(20),
            'note' => $request->note,
            'total_amount' => $cart->getTotalAmount(),
        ]);

        return $order;
    }

    /**
     * Get all of the orderDetail for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
