<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class information extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    protected $table='information';
   // protected $fillable = ['Department','DOFB','Gender','Address','phone','Image_Name','Image_Path','user_id'];
    
}
