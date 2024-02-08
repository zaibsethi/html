<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerOrSuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
//            if (Auth::user()->type == 'superAdmin'|| 'owner')
                if(Auth::user()->type == 'owner' || Auth::user()->type == 'superAdmin')

                {
//                return redirect()->with('status', 'Access Denied you are not Owner.');
                return $next($request);

            } else {
                return redirect(route('noAccess'))->with('danger', 'Access Denied you are not Able to access this page.');
            }

        } else {
            return redirect()->back()->with('success', 'Access Denied you are not logged in.');
        }

    }
}
