<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;

class CarController extends Controller
{
    public function index(){

        $car =  new CarModel();

        $data=$car->get();
        var_dump($data);



        return view('pages.form');
    }

}
