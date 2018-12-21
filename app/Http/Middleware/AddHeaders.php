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

        if (! $request->wantsJson()) {
            abort(406, 'Invalid accept header');
        }

        $response = $next($request);

        return $response;
    }
}
