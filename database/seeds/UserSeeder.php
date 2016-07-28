<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
//      DB::table('users')->delete();
        User::create([
            'name' => 'John1 Doe1',
            'email' => 'john.doe1@gmail.com',
            'password' => Hash::make('password')
            //'password' => bcrypt('password')
        ]);
    }
}