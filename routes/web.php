<?php

use App\Admin;

Route::get('/', function () {
    return redirect('login');
});

//     Route::get('/home', function(){
//         return view("/backend/layout/app");
//     });
    
  //Route::get("/profile","backend\problems@profile")-> middleware('Admin');
  //Route::get("/profile_edit","backend\problems@profile_edit")-> middleware('Admin');
//   Route::get("/problems_entry_form","backend\problems@problem_entry");
//   Route::get("/problem_edit_form/{id}","backend\problems@problems_edit");
//   Route::post("/problem_update","backend\problems@problem_update");
//   Route::get("/problems_list","backend\problems@problems_list");
  //Route::get("/delete_data/{id}","backend\problems@delete");
//   Route::get("/delete_data","backend\problems@delete");
//   Route::get("/time_setting","backend\problems@time_settings");
//   Route::get("/winer_list","backend\problems@winer_list");
 // Route::get("/home","backend\problems@home");
  //Route::post("/problem_insert","backend\problems@problem_insert");
  
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'Admin','auth'],function(){
    Route::get('/home', 'backend\problems@home');
    
    Route::get("/profile/{id}","backend\Profile@profile");
    Route::get("/profile_edit/{id}","backend\Profile@profile_edit");
    //Route::post("/profile_update","backend\Profile@profile_update");    
    Route::post("/profile_update","backend\Profile@profile_update");
    
    Route::get("/problems_entry_form","backend\problems@problem_entry");
    Route::get("/problem_edit_form/{id}","backend\problems@problems_edit");
    Route::post("/problem_update","backend\problems@problem_update");
    
    Route::get("/problems_list","backend\problems@problems_list");
    Route::post("/problem_insert","backend\problems@problem_insert");
    Route::get("/delete_data","backend\problems@delete");
    Route::get("/time_setting","backend\problems@time_settings");
    Route::get("/winer_list","backend\problems@winer_list");
    
    
    Route::get('/user/home', 'User_controller@index');
    Route::get('/user/problem_list', 'backend\problems@problem_list');
    Route::get('/user/problem/{id}', 'backend\problems@problem');
    
    
    Route::post('/user/submition','submitioncontroller@submition');
    Route::get('/user/all_submition/{id}','submitioncontroller@all_submition');
    Route::get('/user/all_posts','submitioncontroller@all_posts');
//     Route::get('/home',function(){
//     $type =User::auth()->user_type;
//         if ( $type == 0){
//            return view('/home');
//         }else {
// //             $users['users'] = \App\User::all();
//             return view("/problems_list");
//         }
        
//     });
});

