<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Model::unguard();

        DB::table('images')->insert([
            [

                'id' => 1,
                'type' =>'slider',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

            [

                'id' => 2,
                'type' =>'slider',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 3,
                'type' =>'slider',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 4,
                'type' =>'slider',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
