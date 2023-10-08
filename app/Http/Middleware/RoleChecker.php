<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user() && $request->user()->user_role_id == $role) {
            return $next($request);
        }

        return redirect('/')->with('message', ['You are logged in as '.$request->user()->user_role_id]);
        //        abort('403'); // or you can throw any other http exception here...
    }
}
