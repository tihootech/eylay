<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\UserActivity;

class StoreUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->type != 'master') {
        	$ua = new UserActivity;
        	$ua->user_id = $user->id;
        	$ua->method = request()->method();
        	$ua->url = request()->fullUrl();
        	$ua->save();
        }
        return $next($request);
    }
}
