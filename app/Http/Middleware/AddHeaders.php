<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class AddHeaders
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
        $request->expectsJson();

        // if (! $request->wantsJson()) {
        //     abort(415);
        // }

        $response = $next($request);

        $response->header('allow', 'GET, POST, OPTIONS');

        return $response;
    }
}
