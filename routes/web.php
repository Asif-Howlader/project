<?php

use App\Admin;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/password/reset', 'ResetPasswordController@reset');
// Route::get('/u_home',['middleware' => ['Admin'],function(){
//     echo "we are in Admin Dashboard!!";

// }]);

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    //Route::get('/home', '@index'); 
  // Route::group(['prefix' => 'teacher'],function (){        
    Route::get('/teacher_home', 'Admin_Controller@index');    
    Route::get("/profile/{id}","Admin_Controller@profile");    
    Route::get("/time_setting","Admin_Controller@time_settings");
    Route::get("/profile_edit/{id}","Admin_Controller@profile_edit");    
    Route::post("/profile_update","Admin_Controller@profile_update");  
    
    Route::get("/problems_posting_form","Admin_Problems@problem_entry");    
    Route::post("/problem_insert","Admin_Problems@problem_insert");
    Route::get("/problem_edit_form/{id}","Admin_Problems@problems_edit");    
    Route::post("/problem_update","Admin_Problems@problem_update");    
    Route::get("/problems_list","Admin_Problems@problems_list");
    Route::get("/delete_data","Admin_Problems@delete");
    
    Route::get("/evaluation_list","Admin_Submition@winer_list");
    Route::post("/currection","Admin_Submition@currection");    
    Route::get("/discussion_board","Admin_Submition@all_submiton_list");
    Route::post("/admin_comment","Admin_Submition@admin_comment");
    
    Route::get("/class_students","Admin_Controller@class_students");
    Route::get("/student_profile/{id}","Admin_Controller@student_profile");    
   // Route::get('/all_classes','User_controller@admin_all_classes');
    
  // });
    });

Route::group(['prefix' => 'user','middleware' => 'auth'],function (){
    
    Route::get('/home','User_controller@index');         
    Route::get('/problem_list','User_controller@user_problem_list');
    Route::get('/problem/{id}','User_controller@problem');  
    Route::post('/submition','User_Submition@submition');    
    Route::get('/all_submition/{id}','User_Submition@all_submition');
    
    Route::get('/all_posts','User_controller@all_posts');
    Route::post('/comment','User_controller@comment');
    
    Route::get("/profile/{id}","User_Profile@user_profile");
    Route::get("/profile_edit/{id}","User_Profile@user_profile_edit");
    Route::post("/profile_update","User_Profile@user_profile_update");    
    
    });
    
// });