<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->role == '2')
            {
                return $next($request);
            }else
            {
                return redirect('/faculty-dashboard');
            }
        }

        // After Login Set Redirect Path According to the role
        // if (Auth::guard($guard)->check()) {
        //     $role = Auth::user()->role;

        //     if($role == 1)
        //     {
        //         return redirect('/admin-dashboard');
        //     }
        //     else if($role == 2)
        //     {
        //         return redirect('/faculty-dashboard');
        //     }
        //     else if($role == 3)
        //     {
        //         return redirect('/student-dashboard');
        //     }
        //     else
        //     {
        //         return redirect('/login');
        //     }
        // }

    }
}
