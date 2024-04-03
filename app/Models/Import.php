<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    
    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'supplier_id',
        'import_date',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function importDetails()
    {
        return $this->hasMany(ImportDetail::class);
    }
}
