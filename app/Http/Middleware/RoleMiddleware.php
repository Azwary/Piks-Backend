<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        // Cek apakah pengguna memiliki role yang sesuai
        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
    }
}
