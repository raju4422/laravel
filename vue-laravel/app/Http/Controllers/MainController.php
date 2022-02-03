<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;






class MainController extends Controller
{


    private $table;


    public function __construct(){
        $this->table = DB::table('users');

    }
    

    public function index(){



        

        $res= $this->table->get();
        $data = array('response'=>'true','data'=>$res);
        return $data;

     
    }

    public function delete(Request $request){
       return $this->table->where('id',$request->user_id)->delete();
    }


    public function getDataById(Request $request){

      return  $this->table->where('id',$request->id)->get();

    }


    public function login(Request $request){

        $data = $this->table->where('email',$request->email)->first();
        $response = null;
        if(Hash::check($request->password, $data->password)){
        $user_data = array(
            'user_id'=>$data->id,
            'user_email'=>$data->email,
            'access_code'=>$data->login_code,
            'isLoggedIn'=>true
        );
         Session($user_data);
         
         $response = array('response'=>true,'access_code'=>$data->login_code,'user_id'=>$data->id,'isLoggedIn'=>true);
        }else{
            $response = array('response'=>false);
        }
       
        return $response;



    }

    public function update(Request $request){
        $data = array(
         'name'=>$request->name,
         'email'=>$request->email

        );
        return $this->table->where('id',$request->id)->update($data);
    }


    public function save(Request $request){

       $data=array(
      'name'=>$request->name,
      'email'=>$request->email

       );


       $res=DB::insert('insert into users  (name,email,password,login_code) values (?, ?, ?,?)', [$request->name, $request->email,Hash::make('123456'),rand(1000,9999)]);
       return $res;

    }

    public function logout(Request $request){
        // $request->session()->destroy();
        // $request->session()->flush();
       return  Session::flush();
        
    }


    public function test(Request $request){
        var_dump(Session::all());
    }



}
