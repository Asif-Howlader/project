<?php

namespace App\Http\Controllers;

use App\Comment;
use App\problem;
use App\submition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_controller extends Controller
{
    //
    
    public function index(){
        if (!\Illuminate\Support\Facades\Gate::allows('isUser')){
            abort(404,"Sorry You can't access this page");
        }       
        return view("fontend.home");
    }    
    
    public function user_problem_list(){
        $problems_list   =   problem::paginate(4);
        return view("fontend.problems_list", compact("problems_list"));
    }
    
    
    public function problem(Request $request){
        $all_info = problem::find($request->id);
        $c_id=Auth::user()->id;
        $ok       = submition::where('problem_id',$request->id)->where('user_id',$c_id)->get();
        $user_id=(object)$ok;  
        //dd($ok);
        
        //dd($c_id);
        return view("fontend.problem",compact("all_info","user_id","c_id"));
    }

    
    public function all_classes(){
        
    }
    
    public function all_posts(){
        
        $all_info=submition::paginate(4);
        return view("/fontend/all_post", compact("all_info"));
    }    
    
    public function comment(Request $request){
        $tab=$request->all();
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
        return view(".fontend.submitions", compact("all_info","inn"));
        
    }
}
