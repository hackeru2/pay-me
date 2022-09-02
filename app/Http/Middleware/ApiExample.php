<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiExample
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->seller_payme_id) throw new \Exception("Please send a valid seller_payme_id");
        return $next($request);
    }
}
