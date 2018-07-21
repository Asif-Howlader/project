<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\information;
use App\User;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setNameAttribute($value){
        $this->attributes['name']=ucfirst($value);
    }
    public function getNameAttribute($value){
        return strtoupper($value);
    }
    
    public function informaton(){
        return $this->hasOne(information::class);
    }
//     public function is_admin(){
//         if ($this->user_type){
//             return true;
//         }
//         return false;
//     }

    public function submition(){
        return $this->hasMany(submition::class);
    }
}
