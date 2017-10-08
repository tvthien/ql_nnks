<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckSuperadmin
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->ma_quyen_user == '1') 
            {
                //view()->share('role', 'admin/');
                return $next($request);    
            }
        }
        else return redirect('dangnhap');
    }
}
