<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
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

        DB::table('currencies')->insert([
            [

                'id' => 1,
                'stage' =>0,
                'name' =>'currency',
                'link' =>null,
                'price' => 1.20,
                'desc' => null,
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 2,
                'stage' =>1,
                'name' =>null,
                'link' =>'www.stage1.com',
                'price' => null,
                'desc' => 'currency desc stage 1',
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 3,
                'stage' =>2,
                'name' =>null,
                'link' =>'www.stage2.com',
                'price' => null,
                'desc' => 'currency desc stage 2',
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 4,
                'stage' =>3,
                'name' =>null,
                'link' =>'www.stage3.com',
                'price' => null,
                'desc' => 'currency desc stage 3',
                'image' => '',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }

}
