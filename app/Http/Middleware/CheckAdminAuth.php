<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminAuth
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
        if (!session()->has('isAdmin') ){
          return redirect('/admin/login');
        }
        return $next($request);
    }
}
