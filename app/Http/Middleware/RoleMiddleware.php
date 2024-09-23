<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, string $role)
    // {
    //     if (!Auth::check() || !$request->user()->hasRole($role)) {
    //         // إذا لم يكن المستخدم مسجل الدخول أو ليس لديه الدور المطلوب
    //         abort(403, 'Unauthorized action.');
    //     }

    //     return $next($request);
    // }

  

    // public function handle(Request $request, Closure $next ): Response
    // {

    //     if (auth()->user()->name == 'ahmed') {



    //         return response('hgpshf ydd ka');
    //     }



    //     return $next($request);
    // }



public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check()) {
        // إذا لم يكن المستخدم مسجل الدخول
        abort(403, 'Unauthorized action.');
        // return redirect()->route('home');
    }

    if (Auth()->user()->name == 'ahmed') {
        return response('hgpshf ydd ka');
    }

    return $next($request);
}


    
}

