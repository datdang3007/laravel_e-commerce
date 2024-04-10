<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'unit',
        'price',
        'image',
        'description',
        'stock_quantity',
        'category_id',
        'manufacturer_id',
        'production_date',
        'production_location',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
