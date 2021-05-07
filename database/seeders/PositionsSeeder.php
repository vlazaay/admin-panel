<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;


class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Auth::check()){
            $id = Auth::id();
        }else{
            $id = "1";
        }

        $faker = Faker::create();
        for ($i=0; $i<26; $i++){
            DB::table('positions')->insert([
                'name' => $faker->jobTitle,
                'admin_created_id' => $id,
                'admin_updated_id'=> $id,
            ]);
        }


    }
}
