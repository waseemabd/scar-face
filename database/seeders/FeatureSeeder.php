<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
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

        DB::table('features')->insert([
            [

                'id' => 1,
                'title' =>'feature 1',
                'desc' =>'feature 1 desc',
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

            [

                'id' => 2,
                'title' =>'feature 2',
                'desc' =>'feature 2 desc',
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 3,
                'title' =>'feature 3',
                'desc' =>'feature 3 desc',
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 4,
                'title' =>'feature 4',
                'desc' =>'feature 4 desc',
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
