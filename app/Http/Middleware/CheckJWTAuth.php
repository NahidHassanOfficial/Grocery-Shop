<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckJWTAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve the JWT token from the request header or cookie
        $token = $request->bearerToken() ?? $request->cookie('token');

        if (!$token) {
            view()->share('isAuth', false);

            $request->attributes->set('authenticated', false);
            return $next($request);
        }

        try {
            // Decode the JWT token
            $decoded = JWTToken::verifyToken($token);
            if ($decoded) {
                view()->share('isAuth', true);
                $request->attributes->set('authenticated', true);
            }

        } catch (ExpiredException $e) {
            view()->share('isAuth', false);

            $request->attributes->set('authenticated', false);
        } catch (\Exception $e) {
            view()->share('isAuth', false);

            $request->attributes->set('authenticated', false);
        }

        return $next($request);
    }
}
