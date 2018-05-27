<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\problem;
use Symfony\Component\Console\Helper\Table;
class problems extends Controller
{
    //
    public function problem_insert(Request $request) {
        $all_value  =   $request->all();
        $insert_array   =   [
            'name'             => $all_value['name'],
            'discription'      => $all_value['discription']
            
        ];
        problem::insert($insert_array);
        return redirect('/home');
        
     }
    
    public function problem_entry(){
        return view("backend\problem_entry_form");
    }
    
    public function problems_edit(Request $request) {
        $select_id = problem::find($request->id);
       return view("backend\problem_edit_form",compact("select_id"));
    }
    
    public function problem_update(Request $request){
        $all_value      =   $request->all();
        $service        =   problem::find($all_value['service_edit_id']);
        $service->name  =   $all_value['name'];
        $service->discription  =   $all_value['discription'];
        $service->save();
        return redirect("\problems_list");
    }
    
    public function problems_list() {
        $problems_list   =   problem::all();
        return view("backend\problems_list", compact("problems_list"));
     
    }
    
    public function delete(Request $request){
//         $delete_id=problem::findOrFail($request->id);
//         $delete_id->delete();  
//         $all    =   $request->all();
//         $problems_list   =   problem::all();
//         return redirect("\problems_list");        

        $all    =   $request->all();        
        if(isset($request->field_name) && !empty($request->field_name)){
            $delete_field   =   $request->field_name;
        }else{
            $delete_field   =   "id";
        }        
       $feed= DB::table($all['table_name'])->where($delete_field, '=', $all['delete_id'])->delete();        
        
       if($feed){ $feedback   =   [
            'status'    =>  "success",
            'message'   =>  "Data Has successfully Deleted!",
        ];
       } else {
           $feedback   =   [
               'status'    =>  "error ...",
               'message'   =>  "Unable to Delete !",
           ];
       }
        echo json_encode($feedback);
    }

 
        
    public function time_settings(){
        return view("backend.time_settings");
    }
    public function winer_list(){
        return view("backend.winer_list");
    }
    public function home(){
        return view("backend.home");
    }
}
