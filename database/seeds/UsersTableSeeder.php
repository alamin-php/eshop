<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
		'name' => 'Admin',
		'email' => 'admin@info.com',
		'password' => Hash::make('rootadmin'),
		'type' => 'admin',
		]);		

		DB::table('users')->insert([
		'name' => 'User',
		'email' => 'user@info.com',
		'password' => Hash::make('rootuser'),
		'type' => 'user',
		]);
    }
}
