<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
       
        
    }


    public function index()
    {

        $data = User::all()->toArray();

        return view('pages.form', compact('data'));
    }

    public function registerForm()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'password'   => 'required',
        ]);

        $data = array(
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'gender'     => $request->gender,
            'phone'      => $request->phone,
            'role_id'      => '2',
            'password'   => Hash::make($request->password),
        );

        $res = User::insert($data);
        return back()->with('success', 'Data inserted Successfully');

    }

    public function authenticate(Request $request)
    {

        $validated = $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $email    = $request->email;
        $password = $request->password;

        $user_data = User::where('email', $email)->first();
        if(empty($user_data)){
            return back()->with('error', 'Email is Wrong..');

        }else{
        if (Hash::check($password, $user_data['password'])) {
            $data = array(
                'isLoggedIn' => true,
                'email'      => $user_data['email'],
                'name'       => $user_data['first_name'] . ' ' . $user_data['last_name'],
                'id' => $user_data['id']
            );

            Session($data);

            return redirect('/dashboard');

            // var_dump(session()->all());

            // return back()->with('success', 'Login Successfull..');
        } else {
            return back()->with('error', 'Password is Wrong..');
        }
    }
        // var_dump($user_data);

    }

    public function showUsers($id = null)
    {

        $user_details = User::all();
        if (!empty($id)) {
            $column    = "col-md-6 col-xs-12";
            $two_rows  = true;
            $user_data = User::where('id', $id)->first();
        } else {
            $column    = "col-md-12";
            $two_rows  = false;
            $user_data = null;
        }

        return view('pages.show_users', compact('user_details', 'column', 'two_rows', 'user_data'));

    }


    public function ApiShowUsers($id = null)
    {

        $user_details = User::all();
        
        return $user_details;

    }



    public function updateUser(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',

        ]);

        $id   = $request->id;
        $data = array(
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'gender'     => $request->gender,

        );

        $res = User::where('id', $id)->update($data);
        if ($res) {
            return redirect('/show')->with('success', 'User ' . $data['first_name'] . ' data Updated Successfully');
        }

    }

    public function delete($id){
        
         $res = User::where('id', $id)->delete();
        //$res = true;
        if($res){
            Session::flash('success', 'Successfully Deleted!');

            return true;
        }else{
            return false;
        }


    }

    public function test(){

        // $user = new User();

        // $user->role_id="2";
        // $user->first_name="hari123";
        // $user->last_name="chappidi";
        // $user->password=bcrypt('123456');
        // $user->email="hari123@gmail.com";
        // $user->phone="4564564565";
        // $user->gender="male";
        // $user->save();


        // $role = new Role();
        // $role->role="Tester";
        // $role->short_code="tester";
        // $role->save();


        $user = User::all();

        $role = Role::all();
        

        
        //var_dump($role);


        //var_dump($role);





        echo view('test',compact('user','role'));
         
       

    }


    public function menu(){
       
        $menu = DB::select('select * from level_1');
        foreach($menu as $key=>$val){

            $val->data=DB::select('select * from level_2 where level_1_id = "'.$val->id.'"');

            foreach($val->data as $key =>$value){
                $value->new_data=DB::select('select * from level_3 where level_2_id = "'.$value->id.'"');
            }

        }
       // var_dump($menu);

        echo view('pages.menu',compact('menu'));
    }

}
