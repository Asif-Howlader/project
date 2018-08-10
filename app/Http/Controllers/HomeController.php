<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//     public function index()
//     {
//         return view('home');
//     }

    public function index()
    {
        // user retrive:
        
        $user=Auth::user();
        if ($user->user_type == 'admin'){
            return redirect('/admin/teacher_home');
        }elseif ($user->user_type == 'user'){
            if (Auth::check())
                return redirect('/user/home');
        }
//         return $next($request); 
//         $user   =   Auth::user();
// //         return view('backend.home', compact('user'));
//         return redirect('/home');
    }
}
