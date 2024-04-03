<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportStatus extends Model
{
    use HasFactory;
    
    protected $table = 'import_statuses';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];
}
