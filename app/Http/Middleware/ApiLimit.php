<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->api_limit > 0) {
            $user = Auth::user();
            $user->api_limit--;
            $user->save();
        } else {
            return response()->json([
                'code' => 403,
                'message' => 'Forbidden!!! Your limit of 1000 attemptsm to the api was reached',
            ]);
        }

        return $next($request);
    }
}
