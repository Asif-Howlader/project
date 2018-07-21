<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\information;
use App\User;
use Image;
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
    
    public function profile_update(Request $request){
        
        $all_value      =   $request->all();
        $service        =   information::find($all_value['profile_edit_id']);
        $service->phone  =   $all_value['phone'];
//         $img=base64_encode(file_get_contents($_FILES['f1']["size"] < 500000)) ;
//         $service->image = $img;
//         $location =  $service->image->photo->store('images');
// //         return Storage::putFile('public',$all_value['file']);
//         return $all_value['file']->image->extension();
        //Image::make($all_value['file'])->resize(100,100)->save($location);
        $service->Address     =   $all_value['Address'];
        $service->Department  =   $all_value['Department'];
        $service->Gender      =   $all_value['Gender'];
        
        $myfile               = $all_value['pic']; 
        $file                 = $request->file('pic');
        $files =$file->getClientOriginalName();
        //dd($files);
        $service->Image= $files;
        $destination ='images';
        // = base_path() . '/public/uploads';
        $file->move($destination,$files);
        $service->save();
        return redirect("home");
    }
//     public function information(){
//         $request= [            
//             "Department"=>null(),
//             "DOFB"=>null(),
//             "Gender"=>null(),
//             "Address"=>null(),
//             "phone"=>null(),
//             "image"=>null()
//         ];
// //         information::insert($request->all());

//         information::save($request);
//     }
    
}
