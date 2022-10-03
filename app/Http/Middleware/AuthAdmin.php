<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'admin'){
            return $next($request);
        }
       return redirect()->route('home')->with('Error','You are not admin');
    }
}
