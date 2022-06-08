<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
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

        DB::table('partners')->insert([
            [

                'id' => 1,
                'name' =>'partner 1',
                'logo' =>'',
                'link' => 'www.partner_1.com',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

            [

                'id' => 2,
                'name' =>'partner 2',
                'logo' =>'',
                'link' => 'www.partner_2.com',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 3,
                'name' =>'partner 3',
                'logo' =>'',
                'link' => 'www.partner_3.com',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 4,
                'name' =>'partner 4',
                'logo' =>'',
                'link' => 'www.partner_4.com',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
