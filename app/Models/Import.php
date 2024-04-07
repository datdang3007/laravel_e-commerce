<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    
    protected $table = 'imports';

    protected $primaryKey = 'id';

    protected $fillable = [
        'supplier_id',
        'user_id',
        'total_amount',
        'status',
        'import_date',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function details()
    {
        return $this->hasMany(ImportDetail::class);
    }
}
