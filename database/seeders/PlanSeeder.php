<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
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

        DB::table('plans')->insert([
            [

                'id' => 1,
                'title' =>'plan title',
                'desc' =>'plan desc',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],


        ]);
    }
}
