<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new \App\User([
            'username' => 'changyuen',
            'email' => 'admin1@eoku.com',
            'password' => bcrypt('changyuen123'),
            'user_type' => 'Admin',
            'activated' => 1 
        ]);
        $users ->save();

        $users = new \App\User([
            'username' => 'yewrui',
            'email' => 'admin2@eoku.com',
            'password' => bcrypt('yewrui123'),
            'user_type' => 'Admin',
            'activated' => 1 
        ]);
        $users ->save();

      

     

    }
}
