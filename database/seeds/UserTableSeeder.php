<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        //TestDummy::times(20)->create('App\Post');

        Model::unguard();

        DB::table('users')->delete();

        $users = [
        	['name' => 'Karim Sheikh', 'phone_no' => '01818353742', 'house' => 'Ghagra', 'village' => 'Ghagra', 'post_office' => 'Ghagra', 'post_code' => 4500, 'thana' => 'Kaukhali', 'district' => 'Rangamati', 'password' => \Hash::make('12345678')]
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
