<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminMiddelware
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
        
        $user=Auth::user();
        if ($user->user_type == 'admin'){
            return redirect('/admin/teacher_home');
        }elseif ($user->user_type == 'user'){
            if (Auth::check())
            return redirect('/user/home');
        }
        return $next($request);        
//         return redirect('/login');
        
    }
}
