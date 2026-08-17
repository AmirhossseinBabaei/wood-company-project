<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class EnLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //set english language for app
        App::setLocale('en');

        return $next($request);
    }
}
