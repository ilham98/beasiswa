<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->where('role', '<>', '1')->delete();
    	for($x = 1; $x <= 30; $x++) {
    		DB::table('users')->insert([
    			'email' => 'user'.$x.'@gmail.com',
    			'password' => Hash::make('user'.$x.'@gmail.com'),
    			'role' => '2'
	        ]);
    	}     
    }
}
