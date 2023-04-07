<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class UserFacebook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (! is_null(auth()->user()->Id_user_media)) {
            throw new Exception('لا يكمن تغيير صورة الفيس بوك من الموقع', 1);
        }

        return $next($request);
    }
}
