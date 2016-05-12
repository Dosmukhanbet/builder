<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class OnlyMasters
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
        if(Auth::user() && Auth::user()->type == 'master')
        {
            return $next($request);
        } else {
            flash()->error('Ошибка', ' Только мастера могут просматривать эту страницу');
            return redirect('/');
        }
    }
}
