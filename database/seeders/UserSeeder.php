<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'mohamed Ali',
            'email' => 'ahmed@gmail.com',
            'password' => Hash::make('password123'),  
            'email_verified_at' => now(),   
        ]);

        User::create([
            'name' => 'Ahmed Ali',
            'email' => 'ahmed1@gmail.com',
            'password' => Hash::make('password123'), 
            'email_verified_at' => now(),  
        ]);


        User::create([
            'name' => 'ali Ali',
            'email' => 'ahmed2@gmail.com',
            'password' => Hash::make('password123'), 
            'email_verified_at' => now(), 
        ]);


        User::create([
            'name' => 'aser Ali',
            'email' => 'ahmed3@gmail.com',
            'password' => Hash::make('password123'),  
            'email_verified_at' => now(), 
        ]);


        User::create([
            'name' => 'asharf Ali',
            'email' => 'ahmed4@gmail.com',
            'password' => Hash::make('password123'), 
            'email_verified_at' => now(), 
        ]);
    }
}
