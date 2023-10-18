<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id' ;

    protected $table = 'schools'; // Specify the table name

    // Other model code...
}
