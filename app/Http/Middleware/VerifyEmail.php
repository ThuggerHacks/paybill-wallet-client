<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyEmail
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

        if(!$request->session()->has('user_token')){
            return redirect()->route('login');
        }

        //get the user if is valid

        $user = Http::withHeaders([
            'Accept' => 'application/json',
            'access_token' => $request->session()->get('user_token')
        ])->get(config("constants.paybill_api").'/user/profile');

        //if any error occurs with the token
        if(isset($user['error'])){
            $request->session()->forget('user_token');
            return redirect()->route('login');
        }

        //verifying if email is verified
        if(isset($user['user_email_verified'])){
            if($user['user_email_verified']){
                return redirect()->route("home");
            }
        }

        
        return $next($request);
        
    }
}
