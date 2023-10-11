<?php

namespace Yudhatp\CheckDefPass\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CheckDefaultPasswordMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $except = config('default-password.except-routes', []);
        $pass = config('default-password.passwords', 'id');
        $redirect = config('default-password.redirect', '/');
        $userID = config('default-password.user', 'id');

        foreach ($except as $excluded_route) {
            if ($request->path() === $excluded_route) {
                return  $next($request);
            }
        }

        $user = \Auth::user();
        if (empty($user)) {
            return $next($request);
        }

        //check if column exists on $user
        if (empty($user->getOriginal($userID))) {
            return $next($request);
        }

        $tmp = DB::select("select password from users where ".$userID."='".$user->getOriginal($userID)."'");
        foreach ($pass as $p) {
            if (Hash::check($p, $tmp[0]->password)) {
                return redirect()->url($redirect);
            }
        }
        return $next($request);
    }
}