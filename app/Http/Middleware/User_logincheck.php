<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class User_logincheck
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
        $data = Session::get('app_userdata');
        if ($data != null) {
            return $next($request);
        } else {
            return redirect()->route('user_login');
        }
    }
}
