<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class problems extends Controller
{
    //
    public function problem_entry(){
        return view("backend\problem_entry_form");
    }
    
    public function problems_edit() {
       return view("backend\problem_edit_form");
    }
    public function student_list() {
        return view("backend\student_list");
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
