<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

class apiProtectedRoute extends BaseMiddleware
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
        //return $next($request);
        try {
            $user = JWTAuth::parseToken()->authenticate();
        }
        catch ( \Exception $e){
            if($e instanceof \Tymon\JWTAuth\Exception\TokenInvalidException){
                return response()->json(['status' => 'Token is invalid']);
            } else if($e instanceof \Tymon\JWTAuth\Exception\TokenExpiredException){
                return response()->json(['status' => 'Token is expired']);
            } else {
                return response()->json(['status' => 'Authorization token not found']);
            }
        }

        return $next($request);
    }
}
