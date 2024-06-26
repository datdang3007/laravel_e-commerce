<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    
    protected $table = 'suppliers';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        // Add other fillable fields here
    ];

    public function imports()
    {
        return $this->hasMany(Import::class);
    }
}
