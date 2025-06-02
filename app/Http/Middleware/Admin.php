<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;    
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized1', 'debug' => 'User not authenticated'], 403);
        }

        $user = User::where('id', Auth::id())->first();

        if (!$user || $user->role !== 'Admin') {
            return response()->json(['message' => 'Unauthorized2',Auth::check(), 'debug' => 'User role not Admin or user not found'], 403);
        }

        return $next($request);
    }
}
