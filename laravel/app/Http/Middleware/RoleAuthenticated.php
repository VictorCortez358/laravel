<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class RoleAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Intenta obtener el usuario autenticado desde el token JWT
        try {
            $user = JWTAuth::parseToken()->authenticate();
            var_dump($user);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Verifica si el usuario tiene el rol requerido
        if (!$user || !in_array($user->role, $roles)) {
            return response()->json(['message' => 'Unauthorized'], 403); 
        }

        return $next($request);
    }
}
