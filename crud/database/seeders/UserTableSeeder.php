<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->insert([
        //     'role' => 'Admin',
        //     'short_code'=>'admin'
        //        ]);

        DB::table('users')->insert(
            [
            'role_id' => '1',
			'first_name' => 'ravi',
            'last_name' => 'chappidi',
			'email' => 'ravi@gmail.com',
            'password' => bcrypt('123456'), // Can also be used Hash::make('password@123')
            'phone' => '123456',
            'gender' =>'male'
               ],

               [
                'role_id' => '1',
                'first_name' => 'raju',
                'last_name' => 'chappidi',
                'email' => 'raju@gmail.com',
                'password' => bcrypt('123456'), // Can also be used Hash::make('password@123')
                'phone' => '123456',
                'gender' =>'male'
                   ],
            
            );
    }
}
