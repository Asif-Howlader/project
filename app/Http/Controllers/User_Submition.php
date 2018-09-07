<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\problem;
use Illuminate\Validation\Validator;
use App\information;
use App\User;
use App\Http\Controllers;
use App\submition;
use App\Comment;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\View;


class User_Submition extends Controller
{
    //
    
    public function submition(Request $request){
        $tab=$request->all();
        $re=[
            "user_id" => $tab['user_id'],
            "problem_id"=>$tab['id'],
            "submited_code"=> $tab['code'],
            "submited_time"=>date("Y-m-d h:i:s a", time()),
        ];
        $innf=DB::table('submitions')->where('user_id',$tab['user_id'])->where('problem_id',$tab['id'])->first();
        //dd($innf);
        if (!empty($innf)){
            return back();
        }
        submition::create($re);
        return back();
    }
    
    public function all_submition(Request $request){
        $post=$request->id;
        $all_info = DB::table('submitions')->where('problem_id',$post)->get();
        //dd($all_info);
        $info_all = array();
        $user_in = array();
        foreach ($all_info as $info){
            $post_id= $info->id;
            $user_id=$info->user_id;
            
            //for user information
            $user_info=DB::table('users')->where('id',$user_id)->get();
            foreach ($user_info as $uid){
                $user_in[]=$uid;
            }            
            
            //for comments
            $all_in=submition::find($post_id)->comment;
            foreach ($all_in as $in){
                $info_all[]=$in;
            }            
        }
        $inn=(object)$info_all;
        $user_info=(object)$user_in;        
        return view(".fontend.submitions", compact("all_info","inn","user_info"));
    }
    
}
