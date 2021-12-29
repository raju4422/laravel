<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarModel extends Model
{
    public function get(){
        $data = DB::table('users')->get();
        return $data;
    }
}
