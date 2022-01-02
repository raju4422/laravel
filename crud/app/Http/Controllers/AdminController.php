<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //

    public function index()
    {

        return "<h1>Hi " . Session::get('name') . "</h1>";
    }

    public function logout()
    {
        Session::flush();
    }
}
