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

        DB::table('categories')->delete();

        Category::create(
            ['title' => 'root', 
                'children' => [
                    [
                        'title' => 'শাক সবজি',
                        'slug' => 'vegitables',
                        'children' => [
                            ['title' => 'আলু', 'slug' => 'potato'],
                            ['title' => 'বেগুন', 'slug' => 'begun'],
                            ['title' => 'পটল', 'slug' => 'potol'],
                            ['title' => 'টমেটো', 'slug' => 'tomato'],
                            ['title' => 'লাউ', 'slug' => 'lao'],
                            ['title' => 'মিষ্টি কুমড়া', 'slug' => 'misti-kumra'],
                        ]

                    ],
                    ['title' => 'পোল্ট্রি', 'slug' => 'poltri'],
                    ['title' => 'মাছ', 'slug' => 'fish'],
                    [
                        'title' => 'শস্য জাতীয় ফসল', 
                        'slug' => 'grain-crops',
                        'children' => [
                            ['title' => 'ধাঁন', 'slug' => 'peddy'],
                            ['title' => 'গম', 'slug' => 'job'],
                            ['title' => 'ভুট্টা', 'slug' => 'corn'],
                            ['title' => 'চাল', 'slug' => 'rice'],
                            ['title' => 'আটা', 'slug' => 'flour']
                        ]
                    ],
                    [   
                        'title' => 'তৈল জাতীয় ফসল', 
                        'slug' => 'oil-crops',
                        'children' => [
                            ['title' => 'সরিষা', 'slug' => 'sorisa'],
                            ['title' => 'সয়াবিন', 'slug' => 'soyabin'],
                            ['title' => 'তিল', 'slug' => 'til']
                        ]
                    ],
                    [
                        'title' => 'ডাল জাতীয় ফসল', 
                        'slug' => 'dal-crops',
                        'children' => [
                            ['title' => 'মসুর ডাল', 'slug' => 'mosur'],
                            ['title' => 'মুগ ডাল', 'slug' => 'mug'],
                            ['title' => 'মাসকলাই ডাল', 'slug' => 'maskolai'],
                            ['title' => 'ছোলা ডাল', 'slug' => 'chola'],
                            ['title' => 'মটরশুটি', 'slug' => 'motorsuti']
                        ]
                    ],
                    [
                        'title' => 'মসলা জাতীয় ফসল', 
                        'slug' => 'spice-crops',
                        'children' => [
                            ['title' => 'পেঁয়াজ', 'slug' => 'paise'],
                            ['title' => 'রসুন', 'slug' => 'rosun'],
                            ['title' => 'মরিচ', 'slug' => 'morich'],
                            ['title' => 'আদা', 'slug' => 'ada'],
                            ['title' => 'ধনিয়া', 'slug' => 'dhonia']
                        ]
                    ],
                    [
                        'title' => 'ফলমূল', 
                        'slug' => 'fruits',
                        'children' => [
                            ['title' => 'আম', 'slug' => 'mango'],
                            ['title' => 'জাম', 'slug' => 'berry'],
                            ['title' => 'কাঁঠাল', 'slug' => 'jackfruit'],
                            ['title' => 'কলা', 'slug' => 'banana'],
                            ['title' => 'পেঁয়ারা', 'slug' => 'goaba']
                        ]
                    ],
                    [
                        'title' => 'ফুল', 
                        'slug' => 'flowers',
                        'children' => [
                            ['title' => 'গোলাপ', 'slug' => 'golap'],
                            ['title' => 'রজনীগন্ধা', 'slug' => 'rojonigondha'],
                            ['title' => 'গাঁদা', 'slug' => 'gada']
                        ]
                    ],
                ]
            ]
        );
        Model::reguard();
    }
}
