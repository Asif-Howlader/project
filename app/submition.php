<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class submition extends Model
{
    //
    protected $table='submitions';
    protected $fillable = ['user_id','submited_code','problem_id','status','t_val',];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function submition(){
        return $this->hasMany(User::class);
    }
}
