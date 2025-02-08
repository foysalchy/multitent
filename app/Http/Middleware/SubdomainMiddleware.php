<?php

namespace App\Http\Middleware;

use Closure;

class SubdomainMiddleware
{
    public function handle($request, Closure $next)
    {
        $host = request()->getHost(); // Example: storeone.localhost
        $subdomain = explode('.', $host)[0]; // Extract 'storeone'

        if ($subdomain !== 'localhost' && $subdomain !== 'www') {
            // Force Laravel to recognize subdomain route
            return $next($request);
        } 
return redirect('/home');
        // Redirect to main route if no subdomain is found
       
    }
}
