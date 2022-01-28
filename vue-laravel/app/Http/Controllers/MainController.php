<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class MainController extends Controller
{


    private $table;


    public function __construct(){
        $this->table = DB::table('users');

    }
    

    public function index(){

        return $this->table->get();

    }

    public function delete(Request $request,$id){
        $this->table->delete()->where('id',$id);
    }


    public function save(Request $request){

       $data=array(
      'name'=>$request->name,
      'email'=>$request->email

       );


       $res=DB::insert('insert into users  (name,email,password) values (?, ?, ?)', [$request->name, $request->email,'123456']);
       return $res;

    }



}
