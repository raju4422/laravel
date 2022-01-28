<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;





class Api extends Controller
{
    public function getUsers(){

        $user_details = User::all();
        return $user_details;
    }



    public function delete($id){
        $user = User::where('id', $id)->delete();
        return  $user;

    }


    public function getUserById($id){
      $data= User::find($id);
      return $data;
    }


    public function updateUser(Request $request)
    {


        $id   = $request->id;
        $data = array(
            'first_name' => $request->first_name,
            'email'      => $request->email,
           

        );

        $res = User::where('id', $id)->update($data);
        
            return $res;
     

    }

    public function addUser(Request $request)
    {

       

        $data = array(
            'first_name' => $request->name,
            'email'      => $request->email,
            'role_id'      => '2',
            'password'   => Hash::make($request->password),
        );

        $res = User::insert($data);
        return $res;

    }


    public function authenticate(Request $request)
    {


        $email    = $request->email;
        $password = $request->password;

        $response = null;

        $user_data = User::where('email', $email)->first();
        if(empty($user_data)){
           return $response = array('success'=>false,'message'=>'Email is wrong..','value'=>'');

        }else{
        if (Hash::check($password, $user_data['password'])) {
            $data = array(
                'isLoggedIn' => true,
                'email'      => $user_data['email'],
                'name'       => $user_data['first_name'] . ' ' . $user_data['last_name'],
                'id' => $user_data['id']
            );

            Session($data);

            return $response = array('success'=>true,'message'=>'','value'=>$data);


        } else {
            return $response = array('success'=>false,'message'=>'Password is Wrong..','value'=>'');

        }
    }

}




}
