<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use App\Models\User; 
use App\Models\task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    // protected $table='emp_role';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public function tasks(){
    //     return $this->belongsToMany(task::class,'usertasks','task_id','user_id' );
    // }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(task::class,'usertasks','user_id','task_id');
    }
    public function getrole(): HasMany
    {
        return $this->hasMany(role::class,'user_id','id');
    }
    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class,'Comment','Assioner','');
    // }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
