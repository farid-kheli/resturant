<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    // ...existing code...

    protected function redirectTo($request)
    {
        
        return null;
    }

    // ...existing code...
}