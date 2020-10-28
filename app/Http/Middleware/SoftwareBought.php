<?php

namespace App\Http\Middleware;

use App\Models\SoftwareBuyer;
use Closure;
use Illuminate\Http\Request;

class SoftwareBought
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
        $software_buyer = SoftwareBuyer::firstWhere([
            ['software_id', $id],
            ['user_id', $id]
        ]);

        if($software_buyer && $software_buyer->status()->status == "bought") 
            return redirect()->route('software-detail', ['id', $id]);
        return $next($request);
    }
}
