<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class PreventEditMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $prevent = [
            // 'livewire.update',           
        ];
        $ownerID = 2; //system@slotgen.com
        // dd($request->route()->getName());
        $my = auth()->user();
        // dd($my->id != $ownerID);
        if (!empty($my) && $my->id != $ownerID && in_array($request->route()->getName(), $prevent)) {
            // if ($request->expectsJson()) {
                $res = [
                    'status' => 'FAILED',
                    'success' => false,
                    'message' => 'This action is disabled in demo mode'
                ];
                return response()->json($res);
            // } else {
                // return redirect()->back()->with('error', 'This action is disabled in demo mode');  
            // }
        }
        return $next($request);
    }
}
