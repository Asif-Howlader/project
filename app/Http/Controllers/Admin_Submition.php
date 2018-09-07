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
use App\Comment;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\View;

class Admin_Submition extends Controller
{
    //
    
    public function winer_list(){
        $info=submition::paginate(4);
        return view("/backend/winer_list", compact("info"));
    }
    
    public function currection(Request $request){
        $all_value      =   $request->all();
        $service        =   submition::find($all_value['post_id']);
        $service->t_val  =   $all_value['t_val'];
        $service->state  =   1;
        $service->save();
        return back();
    }
    
    public function all_submiton_list(){
        
       // $all_info = DB::table('submitions')->get();
        $user_info = DB::table('users')
        ->join('submitions','submitions.user_id','=','users.id')
        ->select('users.name','users.Image','submitions.id','submitions.submited_code',
            'submitions.created_at','submitions.problem_id')->get();
        //dd($all_info);
        $info_all = array();
        $user_in = array();
        foreach ($user_info as $info){
            $post_id= $info->id;
//             $user_id=$info->user_id;
            
            
            //for user information
//             $user_info=DB::table('users')->where('id',$user_id)->get();
//             foreach ($user_info as $uid){
//                 $user_in[]=$uid;
//             }
            //$user_in[]=$user_info;
            
            //for submition and user information 
          
            
            //for comments
            $all_in=submition::find($post_id)->comment;
            foreach ($all_in as $in){
                $info_all[]=$in;
            }
        }
        $inn=(object)$info_all;
        //dd($inn);        
       // $user_info=(object)$user_in;  
       // dd($user_info);
        return view(".backend.all_submition_list", compact("all_info","inn","user_info"));
        
    }
    
    public function admin_comment(Request $request){
        
        $tab=$request->all();
        //dd($tab);
        $re=[
            "user_id" => $tab['user_id'],
            "problem_id"=>$tab['problem_id'],
            "user_name"=> $tab['user_name'],
            "comment"=> $tab['comment'],
            "submition_id" => $tab['id'],
            
        ];
        Comment::create($re);
        return back();
    }
}
