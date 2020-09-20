<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class ApiIsAdmin
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

        if($request->has('access_token') && $request->access_token!==null)
        {

            $user=User::where('access_token',$request->access_token)->first();
            if(!$user || $user->is_admin==0)
            {  
                return response()->json("you are not an admin"); 
            }
            return $next($request);
        }else{
            return response()->json("access_token needed"); 
        }

        
    }
}
