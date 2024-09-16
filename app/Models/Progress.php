<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'percentage_done' 
        
    ];
}
