<?php

namespace App\Http\Controllers;

use App\User;
use App\submition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admin_Controller extends Controller
{
    //
    
    public function index(){
        $user =Auth::user();
        $user_id=$user->id;
        $profile=User::find($user_id);
        if (!\Illuminate\Support\Facades\Gate::allows('isAdmin')){
            abort(404,"Sorry You can't access this page");
        }  
        return view("backend.home",compact("profile"));
    }
    
    public function time_settings(){
        return view("backend.time_settings");
    }
    
    public function profile(Request $request){
        
        $profile=User::find($request->id);
        if ($profile==!null){
            $user=User::find($request->id);
            //$all_in=User::find($post_id)->comment;
            //dd($profile);
            return view("backend.profile",compact("profile","user"));
        }
        
        $request= [
            "user_id"=>$request->id,
        ];
        User::insert($request);
        return redirect()->route('/profile/',[$profile]);
        
    }
    
    public function profile_edit(Request $request){
        $profile = User::find($request->id);
        $user=User::find($request->id);
        return view("backend.profile_edit",compact("profile","user"));
    }
    
    public function profile_update(Request $request){
        
        $all_value      =   $request->all();
        $service        =   User::find($all_value['profile_edit_id']);
        $service->phone  =   $all_value['phone'];
        $service->Address     =   $all_value['Address'];
        $service->Department  =   $all_value['Department'];
        $service->Gender      =   $all_value['Gender'];
        $myfile               = $all_value['pic'];
        $file                 = $request->file('pic');
        $files =$file->getClientOriginalName();
        $service->Image= $files;
        $destination ='images';
        $file->move($destination,$files);
        $service->save();
        return redirect("/admin/teacher_home");
    }
    
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
    
    public function search(Request $request){
        $search = $request->search;
        // dd($search);
        if ($search != "") {
            $all_info = User::where('name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->get();
            if (count($all_info) > 0) {
                return view('backend.search', compact("all_info"));
                // ->withQuery($search);
            } else
                $info="No user's found";
                return view('backend.search_notfound', compact("info"));
        }

    }
}

