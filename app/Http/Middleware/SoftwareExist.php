<?php

namespace App\Http\Middleware;

use App\Models\Software;
use Closure;
use Illuminate\Http\Request;

class SoftwareExist
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
        $id = $request->route()->parameter('id');
        if(!Software::find($id)) return redirect()->route('home');
        return $next($request);
    }
}
