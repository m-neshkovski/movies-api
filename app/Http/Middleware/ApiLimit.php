<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLimit
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if($user->api_limit > 0) {
            if(! $user->is_admin) {
                $user = Auth::user();
                $user->api_limit--;
                $user->save();
            }
        } else {
            return response()->json([
                'code' => 403,
                'message' => 'Forbidden!!! Your limit of 1000 attemptsm to the api was reached',
            ]);
        }

        return $next($request);
    }
}
