<?php

use App\Admin;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/u_home',['middleware' => ['Admin'],function(){
//     echo "we are in Admin Dashboard!!";

// }]);

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    //Route::get('/home', '@index'); 
  // Route::group(['prefix' => 'teacher'],function (){        
    Route::get('/teacher_home', 'problems@index');    
    Route::get("/profile/{id}","Profile@profile");
    Route::get("/profile_edit/{id}","Profile@profile_edit");
    Route::post("/profile_update","Profile@profile_update");       
    Route::get("/problems_posting_form","problems@problem_entry");
    Route::get("/problem_edit_form/{id}","problems@problems_edit");
    Route::post("/problem_update","problems@problem_update");    
    Route::get("/problems_list","problems@problems_list");
    Route::post("/problem_insert","problems@problem_insert");
    Route::get("/delete_data","problems@delete");
    Route::get("/time_setting","problems@time_settings");
    Route::get("/evaluation_list","submitioncontroller@winer_list");
    Route::post("/currection","submitioncontroller@currection");    
    Route::get("/discussion_board","submitioncontroller@all_submiton_list");    
    Route::get("/class_students","User_controller@class_students");
    Route::get("/student_profile/{id}","User_controller@student_profile");
    Route::post("/admin_comment","submitioncontroller@admin_comment");
    Route::get('/all_classes','User_controller@admin_all_classes');
  // });
    });

Route::group(['prefix' => 'user','middleware' => 'auth'],function (){
    Route::get('/home', 'User_controller@index');    
    Route::get("/profile/{id}","Profile@user_profile");
    Route::get("/profile_edit/{id}","Profile@user_profile_edit");
    Route::post("/profile_update","Profile@user_profile_update"); 
    Route::get('/problem_list', 'User_controller@user_problem_list');
    Route::get('/problem/{id}', 'User_controller@problem');  
    
    Route::post('/submition','submitioncontroller@submition');
    Route::get('/all_submition/{id}','submitioncontroller@all_submition');
    Route::get('/all_posts','submitioncontroller@all_posts');
    Route::post('/comment','submitioncontroller@comment');
    Route::get('/all_classes','User_controller@all_classes');
    
    });
    
// });