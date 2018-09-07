<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\problem;
use App\submition;
use App\information;
use App\User;

class Admin_Visit_User extends Controller
{
    //
    
    public function class_students(){
        $all_info=DB::table('users')->where('user_type','user')->get();
        return view("backend.class_students",compact("all_info"));
    }
    
    public function student_profile(Request $request){
        $id= $request->id;
        $total_submition=submition::where('user_id',$id)->count();
        // dd($total_submition);
        $user=User::where('id',$id)->first();
        //dd($user);
        $total_result=submition::where('user_id',$id)->where('state','1')->count();
        // dd($total_ok);
        $total_painding=$total_submition-$total_result;
        
        $total_ok=submition::where('user_id',$id)->where('t_val','1')->count();
        $total_not_ok=submition::where('user_id',$id)->where('t_val','0')->count();
        //dd($total_not_ok);
        $all_info=User::find($id);
        if (!empty($all_info)){
            return view("backend.student_profile",compact("all_info","total_submition","total_result","total_painding","total_ok","total_not_ok","user"));
        }
        return view("backend.student_profile_without",compact("total_submition","total_result","total_painding","total_ok","total_not_ok","user"));
    }
}
