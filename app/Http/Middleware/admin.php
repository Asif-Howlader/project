<?php

namespace App\Http\Middleware;
use Validator;
use Closure;
use Illuminate\Support\Facades\Redirect;
use Auth;
class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        return $next($request);        
        return redirect('/login');
    }

// public function handle($request, Closure $next)
// {
//     if (Auth::check() && $request->user()->user_type == 1){
//         return redirect()->guest('home');
//     }
// //     else if (Auth::check() && $request->user()->user_type == 1){
// //         return redirect("problems_list");
// //     }
//         return $next($request);   
// }    
}
