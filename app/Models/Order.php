<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',  'user_id', 'payment_method', 'shipment_method', 'total_price', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalPriceAttribute()
    {
        return 'Rp. ' . number_format($this->total_price, 0, ',', '.');
    }
}
