<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
// use App\Models\task;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class task extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'task_id', 
        'task_name', 
        'task_description', 
        'priority',
         'attached_file',
          'deadline'
    ];
    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class,'usertasks','task_id','user_id');
    }
    // public function getrole(): HasMany
    // {
    //     return $this->hasMany(role::class,'user_id','id');
    // }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'task_id','task_id');
    }

}
