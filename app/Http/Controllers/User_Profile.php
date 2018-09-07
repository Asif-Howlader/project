<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\information;
use App\User;
use Illuminate\Http\UploadedFile;

class User_Profile extends Controller
{
    //
    
    public function user_profile(Request $request){
        
        $profile=User::find($request->id);
        return view("fontend.profile",compact("profile"));        
    }
    
    public function user_profile_edit(Request $request){
        $profile = User::find($request->id);
        return view("fontend.profile_edit",compact("profile"));
    }
    
    public function user_profile_update(Request $request){
        
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
        return redirect("/user/home");
    }
}
