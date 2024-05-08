<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && (Auth::user()->user_type == User::CUSTOMER_TYPE || Auth::user()->user_type == User::DRIVER_TYPE)) {
            return $next($request);
        }
        return redirect()->route('auth.signin');
    }
}
