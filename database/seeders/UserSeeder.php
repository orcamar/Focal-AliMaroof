<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([

            'name'=>'Admin',
            'email'=>'Admin@gmail.com',
            'password'=>'Admin',
            'isAdmin'=>'1',
            


        ]);


        User::Create([

            'name'=>'Ali',
            'email'=>'Ali@gmail.com',
            'password'=>'12345',
            'isAdmin'=>'0',
            

        ]);
    }
}
