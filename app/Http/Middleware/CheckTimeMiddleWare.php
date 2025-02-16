<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_check = $request->route()->parameters();

        foreach ($user_check as $user) {

        }

        if (\App\Models\UserTime::where('user_id', $user->id)->count() <= 0) {
            abort(500);
        }
        return $next($request);
    }
}
