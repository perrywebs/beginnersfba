<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin as AdminModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role != 2) {
            return back()->with('error', 'Unauthorized action:) You are not admin.');
        }
        return $next($request);
    }
}
