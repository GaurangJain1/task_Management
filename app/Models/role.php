<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasOne;

class role extends Model
{
    use HasFactory;
    public $timestamps = false;

    // public function users(): HasOne
    // {
    //     return $this->HasOne(User::class);
    // }
}
