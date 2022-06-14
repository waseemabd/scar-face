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
                'title' => 'lorem 1',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

            [

                'id' => 2,
                'type' =>'slider',
                'title' => 'lorem 2',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 3,
                'type' =>'slider',
                'title' => 'lorem 3',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 4,
                'type' =>'slider',
                'title' => 'lorem 4',
                'image' =>'',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
