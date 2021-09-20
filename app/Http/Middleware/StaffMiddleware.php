<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Response;
use Closure;

class StaffMiddleware
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
        if ($request->user() && $request->user()->user_role != 'staff')
        {
            return new Response(view('auth.unauthorized')->with('role', 'STAFF'));
        }
        return $next($request);
    }
}
