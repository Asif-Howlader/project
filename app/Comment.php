<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\submition;
class Comment extends Model
{
    //
    protected $table='comments';
    protected $fillable = ['user_id','problem_id','user_name','comment','submition_id'];
    
    public function submition(){
        return $this->belongsTo(submition::class);
    }
}
