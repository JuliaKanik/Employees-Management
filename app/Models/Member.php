<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;


class Member extends Model
{
    
    protected $fillable = ['name', 'email', 'school_id'];

    // Rest of your model code
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'ID');
    }
}

