<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    use HasFactory;
    
    protected $table = 'import_details';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'import_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function import()
    {
        return $this->belongsTo(Import::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
