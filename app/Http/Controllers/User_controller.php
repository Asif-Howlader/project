<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\problem;
use App\submition;
use App\information;

class User_controller extends Controller
{
    //
    
    public function index(){
        return view("fontend.home");
    }    
    
    public function user_problem_list(){
        $problems_list   =   problem::paginate(4);
        return view("fontend.problems_list", compact("problems_list"));
    }
    public function problem(Request $request){
        $all_info = problem::find($request->id);
        return view("fontend.problem",compact("all_info"));
    }
    
    public function class_students(){
        $all_info=DB::table('users')->where('user_type','user')->get();
        return view("backend.class_students",compact("all_info"));
    }
    public function student_profile(Request $request){
        $id= $request->id;
        $total_submition=submition::find($id)->where('user_id',$id)->count();
       // dd($total_submition);
        $total_result=submition::find($id)->where('user_id',$id)->where('state','1')->count();
       // dd($total_ok);
        $total_painding=$total_submition-$total_result;
        
        $total_ok=submition::find($id)->where('user_id',$id)->where('t_val','1')->count();
        $total_not_ok=submition::find($id)->where('user_id',$id)->where('t_val','0')->count();
        //dd($total_not_ok);
        $all_info=information::find($id);
        if (!empty($all_info)){
            return view("backend.student_profile",compact("all_info","total_submition","total_result","total_painding","total_ok","total_not_ok"));
        }
        return view("backend.student_profile_without",compact("total_submition","total_result","total_painding","total_ok","total_not_ok"));
    }

}
