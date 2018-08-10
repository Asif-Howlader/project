<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\information;
use App\User;
use Illuminate\Http\UploadedFile;

class Profile extends Controller
{
    //
    
    public function profile(Request $request){

        $profile=information::find($request->id);
        if ($profile==!null){
            $user=User::find($request->id);
            //$all_in=information::find($post_id)->comment;
            //dd($profile);
            return view("backend.profile",compact("profile","user"));
        }
        
        $request= [
            "user_id"=>$request->id,
        ];
        information::insert($request);
        return redirect()->route('/profile/',[$profile]);
        
    }
    
    public function user_profile(Request $request){
        
        $profile=information::find($request->id);
        if ($profile==!null){
            $user=User::find($request->id);
            return view("fontend.profile",compact("profile","user"));
        }
        
        $request= [
            "user_id"=>$request->id,
        ];
        information::insert($request);
        return redirect()->route('/profile/',[$profile]);
        
    }
    
    public function profile_edit(Request $request){
        $profile = information::find($request->id);
        $user=User::find($request->id);
        return view("backend.profile_edit",compact("profile","user"));
    }
    
    public function user_profile_edit(Request $request){
        $profile = information::find($request->id);
        $user=User::find($request->id);
        return view("fontend.profile_edit",compact("profile","user"));
    }
    
    
    public function profile_update(Request $request){
        
        $all_value      =   $request->all();
        $service        =   information::find($all_value['profile_edit_id']);
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
        //return back();
    }
    
    
    public function user_profile_update(Request $request){
        
        $all_value      =   $request->all();
        $service        =   information::find($all_value['profile_edit_id']);
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
        return redirect("/user/home");
    }
    
}
