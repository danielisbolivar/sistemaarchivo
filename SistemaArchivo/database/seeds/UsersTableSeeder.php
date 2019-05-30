<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
        	'name' 	  => 'Admin',
        	'slug' 	  => 'Admin',
        	'special' => 'all-access'
        ]);

        User::create([
             'name'=>'Admin',
            'email'=>'cesared00125@gmail.com',
            'password'=>bcrypt('123456'),
        ]);

        
    }
}
