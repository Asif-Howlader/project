<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class submition extends Model
{
    //
    protected $table='submitions';
    protected $fillable = ['user_id','submited_code','problem_id'];
}
