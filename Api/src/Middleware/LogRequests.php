<?php

namespace oangia\Api\Middleware;

use Closure;
use Log;

class LogRequests
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
        Log::info('app.requests', [
            'headers' => $request->header(),
            'request' => $request->all(),
        ]);

        return $next($request);
    }
}
