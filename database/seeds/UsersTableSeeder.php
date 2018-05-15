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
       $user= App\User::create([
            'name'=>'reham',
            'email'=>'rehamweb@gmail.com',
            'password'=>bcrypt('123456789'),
            'admin'=>1
        ]);

        App\Profile::create([
            'user_id'=>$user->id,
            'about'=>'full stack',
            'avater'=>'uploads/avatars/web.png',
            'facebook'=>'facebook.com'
        ]);
    }
}
