<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
         User::factory()->create([
            'name' => 'Admin',
            'email' => 'kali@gmail.com',
            'rol' => 'admin',
            'password' => ('secret')
        ]);

        User::factory()->create([
            'name' => 'tutor',
            'email' => 'tutor@gmail.com',
            'rol' => 'tutor',
            'password' => ('secret')
        ]);


    }
   
}
