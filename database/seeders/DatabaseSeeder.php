<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->insert([
           
             'course_id' =>2,
                    'role_id' =>2,
                    'fname' =>'met',
                    'lname' => 'sadfa',
                    'mname' => 'dasd',
                    'number' => '678698', 
                    'sufix' =>'jkk', 
                    'email' => 'n@n',
                    'password'=>bcrypt('654321'),
                    'remember_token'=>Str::random(10),  
        ]);

       
      
        // \App\Models\User::factory(10)->create();
    }
}
