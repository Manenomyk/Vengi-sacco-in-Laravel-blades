<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=>0,
            'password'=>Hash::make('password')
        ]);
        User::create([
            'name'=>'clerk',
            'email'=>'clerk@gmail.com',
            'role'=>1,
            'password'=>Hash::make('password')
        ]);
        User::create([
            'name'=>'authorizer',
            'email'=>'authorizer@gmail.com',
            'role'=>2,
            'password'=>Hash::make('password')
        ]);
    }
}
