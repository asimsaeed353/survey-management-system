<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CustomThrottle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $maxAttempts = 5, $delaySeconds = 60): Response
    {

        // Get the ip of the user
        $key = 'login_attempts:' . $request->ip();

        // Calculate the number of attempts, (default to zero)
        $attempts = Cache::get($key, 0);

        if($attempts >= $maxAttempts){
            abort(429, 'Too Many Attempts, Please Try Again Later');
        }

        // Increment the count of the attempts
        Cache::put($key, $attempts + 1, $delaySeconds);

        return $next($request);
    }
}
