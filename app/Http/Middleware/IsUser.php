<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

      //  if((isset(Auth::user()->id) && Auth::user()->id == $request->product->user_id) || Auth::user()->role == 'admin'){

            return $next($request);
        //}
       // return redirect()->back()->with('error','you are not the user , so why you are so Parasitical');


    }
}
