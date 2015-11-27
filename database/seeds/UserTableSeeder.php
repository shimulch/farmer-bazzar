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

        //DB::table('users')->delete();

        $user = new User;
        $user->name = 'Karim Sheikh';
        $user->phone_no = '01818353742';
        $user->house = 'Ghagra';
        $user->village = 'Ghagra';
        $user->post_office = 'Ghagra';
        $user->post_code = 4500;
        $user->thana = 'Kaukhali';
        $user->district = 'Rangamati';
        $user->password = \Hash::make('12345678');
        $user->save();
        
        dd($user);
    }
}
