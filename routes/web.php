<?php

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/home', function(){
        return view("/backend/layout/app");
    });
    
  Route::get("/problems_entry_form","backend\problems@problem_entry");
  Route::get("/problems_edit_form","backend\problems@problems_edit");
  Route::get("/problems_list","backend\problems@problems_list");
  //Route::get("/delete_data/{id}","backend\problems@delete");
  Route::get("/delete_data","backend\problems@delete");
  Route::get("/time_setting","backend\problems@time_settings");
  Route::get("/winer_list","backend\problems@winer_list");
  Route::get("/home","backend\problems@home");
  Route::post("/problem_insert","backend\problems@problem_insert");
  