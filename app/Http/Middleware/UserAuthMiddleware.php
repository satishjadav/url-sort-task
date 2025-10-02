<?php

namespace App\Http\Middleware;

use App\Http\Controllers\EmailSend;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        } else {            
            EmailSend::Send(['id'=>1,'email'=>"satishjadav47@gmail.com"]);
            return redirect()->route('login');
        }
    }
}
