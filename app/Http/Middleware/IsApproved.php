<?php

namespace App\Http\Middleware;

use App\Models\recipe;
use Closure;
use Illuminate\Http\Request;

class IsApproved
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
        $recipe = recipe::where('id', $request->recipe_id)->firstOrFail();

        if ($recipe->is_approved == false) {
           abort(404);
        }
        return $next($request);
    }
}
