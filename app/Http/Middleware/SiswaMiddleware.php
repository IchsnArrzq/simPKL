<?php

namespace App\Http\Middleware;

use Closure;

class SiswaMiddleware
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
        if(auth()->user()->role != 'siswa')
        {
            return redirect()->route('logout');
        }
        return $next($request);
    }
}
