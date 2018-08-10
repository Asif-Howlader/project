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


class submitioncontroller extends Controller
{
    
    
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
         foreach ($all_info as $info){            
             $post_id= $info->id;  
             $all_in=submition::find($post_id)->comment;
             foreach ($all_in as $in){
                 $info_all[]=$in;
             }
         }
         $inn=(object)$info_all;
         //dd($inn);
         return view(".fontend.submitions", compact("all_info","inn"));
//          return View::make(".fontend.submitions")
//                      ->with( compact("all_info"));

    }
    
    public function all_posts(){
        //$all_info = DB::select( DB::raw("SELECT * FROM submitions") );
        $all_info=submition::paginate(4);
        return view("/fontend/all_post", compact("all_info"));
    }
    
    public function comment(Request $request){
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
        
        $all_info = DB::table('submitions')->get();
        //dd($all_info);
        $info_all = array();
        foreach ($all_info as $info){
            $post_id= $info->id;
            $all_in=submition::find($post_id)->comment;
            foreach ($all_in as $in){
                $info_all[]=$in;
            }
        }
        $inn=(object)$info_all;
        //dd($inn);
        return view(".backend.all_submition_list", compact("all_info","inn"));
        
        
        
        //$all_info=submition::paginate(4);
        //dd($all_info);
        
        //return view("/backend/all_submition_list", compact("all_info"));
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
