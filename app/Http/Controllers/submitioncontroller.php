<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\problem;
use Illuminate\Validation\Validator;
use App\information;
use App\User;
use App\Http\Controllers;
use App\submition;


class submitioncontroller extends Controller
{
    //
    public function submition(Request $request){
        $tab=$request->all();
        $re=[
            "user_id" => $tab['user_id'],
            "problem_id"=>$tab['id'],
            "submited_code"=> $tab['code'],          
            
        ];
        submition::create($re);
        return redirect('/user/problem_list');
    }
    
    public function all_submition(Request $request){
        $post=$request->id;
        $all_info = DB::select( DB::raw("SELECT * FROM submitions WHERE problem_id = '$post'") );
        //$all_info   = submition::all($request->id);
        //dd($all_info);
        return view("/fontend/submitions", compact("all_info"));
    }
    
    public function all_posts(){
        $all_info = DB::select( DB::raw("SELECT * FROM submitions") );
        return view("/fontend/all_post", compact("all_info"));
    }
}
