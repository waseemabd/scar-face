<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
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

        DB::table('settings')->insert([
            [

                'id' => 1,
                'type' =>'social',
                'email' =>null,
                'whats_phone' => '+966552255',
                'white_paper_en' =>null,
                'white_paper_ar' =>null,
                'facebook' =>'facebook',
                'twitter' => 'twitter',
                'telegram' =>'feature 1',
                'phones' =>null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

            [

                'id' => 2,
                'type' =>'paper',
                'email' =>null,
                'whats_phone' =>null,
                'white_paper_en' =>'https://docs.google.com/document/d/1gVnZW6rJjDI4sSq8cFiL5ue8o5z2NABBrMIOpSuMH2g/edit?usp=sharing',
                'white_paper_ar' =>'https://docs.google.com/document/d/1rzGRPsZULf7pjJqz4GEG2UYs-Ph7O1uivxO_Zmm-vKI/edit?usp=sharing',
                'facebook' =>null,
                'twitter' => null,
                'telegram' =>null,
                'phones' =>null,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [

                'id' => 3,
                'type' =>'contact',
                'email' =>'support@gmail.com',
                'whats_phone' =>null,
                'white_paper_en' =>null,
                'white_paper_ar' =>null,
                'facebook' =>null,
                'twitter' => null,
                'telegram' =>null,
                'phones' => json_encode(['+95822858', '+95554185263']),
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
