<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
                flash()->info('Внимание!', 'Для просмотра нужно войти в систему!!');
            } else {
                flash()->info('Внимание!', 'Для просмотра нужно войти в систему!');
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
