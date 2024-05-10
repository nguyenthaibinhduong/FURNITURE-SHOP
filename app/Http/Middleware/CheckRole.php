<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('loginadmin');
        }
        $groupRole = User::find(auth()->id())->roles()->select('roles.group')->pluck('group');
        if(!$groupRole->contains('system')){
            Auth::logout();
            $request->session()->invalidate();
           return redirect()->route('unauthorized');
        }else{
          return $next($request);  
        }
        
        
        
    }
}
