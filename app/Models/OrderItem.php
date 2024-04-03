<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Relationship với bảng 'orders'
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relationship với bảng 'products'
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
