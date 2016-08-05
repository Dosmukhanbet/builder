<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class OnlyAdmins
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
        if(Auth::user()->type == 'admin')
        {
            return $next($request);
        } else {
            flash()->error('Ошибка', ' Только Администраторы могут просматривать эту страницу');
            return redirect('/');
        }
    }
}
