<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CheckUser
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

        // var_dump(Session::all());die;
         if ($request->session()->has('isLoggedIn')) {
            $sessionData = Session::all();
            if($sessionData['user_email'] == DB::table('users')->where('login_code', $sessionData['access_code'])->first()->email){
                return $next($request);
            }
         }else{
            echo json_encode(array('response'=>false,'message'=>'Please login')); die();
         }
    }
}
