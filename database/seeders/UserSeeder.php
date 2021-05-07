<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = \DB::table('users')->count();
        if($count == 0){
            $faker = Faker::create();
            DB::table('users')->insert([
                'id' => '1',
                'name' => $faker->name,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('adminadmin'),
            ]);
        }

    }
}
