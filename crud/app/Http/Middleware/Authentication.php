<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;




class Authentication
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

         $sessionData = Session::all();
         if ($request->session()->has('isLoggedIn')) {
            if($sessionData['email'] == DB::table('users')->where('id', $sessionData['id'])->first()->email){
                return $next($request);
            }

           
        } else {
            return redirect('/')->with('error', 'Please login First');
        }

    }
}
