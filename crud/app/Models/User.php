<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table    = "users";
    protected $fillable = ['first_name', 'last_name', 'password', 'gender', 'phone', 'email'];
    public function get()
    {
        $data = DB::table('users')->get()->toArray();
        return $data;
    }


    // public function role(){

    //     return $this->hasOne(Role::class,'role_id');
    // }



}
