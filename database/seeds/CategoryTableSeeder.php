<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        Model::unguard();

        DB::table('users')->delete();

        Category::create(
            ['title' => 'root', 
                'children' => [
                    [
                        'title' => 'শাক সবজি',
                        'slug' => 'vegitables',
                        'children' => [
                            ['title' => 'ধান', 'slug' => 'peddy']
                        ]

                    ],
                    ['title' => 'পোল্ট্রি', 'slug' => 'poltri'],
                    ['title' => 'মাছ', 'slug' => 'fish'],
                    ['title' => 'শস্য জাতীয় ফসল', 'slug' => 'grain-crops'],
                    ['title' => 'তৈল জাতীয় ফসল', 'slug' => 'oil-crops'],
                    ['title' => 'ডাল জাতীয় ফসল', 'slug' => 'dal-crops'],
                    ['title' => 'মসলা জাতীয় ফসল', 'slug' => 'spice-crops'],
                    ['title' => 'ফল', 'slug' => 'fruits'],
                    ['title' => 'ফুল', 'slug' => 'flowers'],
                ]
            ]
        );
        Model::reguard();
    }
}
