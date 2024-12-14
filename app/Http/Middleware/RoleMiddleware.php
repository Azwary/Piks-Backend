<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Memeriksa apakah pengguna terautentikasi
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Memeriksa apakah pengguna memiliki role yang sesuai
        if ($request->user()->role != $role) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
