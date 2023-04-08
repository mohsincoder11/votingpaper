<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Admin_logincheck
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
        $data = Session::get('userdata');
        if ($data != null) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }    }
}
