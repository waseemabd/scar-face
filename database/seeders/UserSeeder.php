<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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

        DB::table('users')->insert([
            [

                'id' => 1,
                'name' =>'admin',
                'email' =>'admin@gmail.com',
                'password' => bcrypt('123'),
                'role' => 1,
                'image' => null,
                'status' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 2,
                'name' =>'omar',
                'email' =>'omar@gmail.com',
                'password' => bcrypt('123'),
                'role' => 1,
                'image' => null,
                'status' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'id' => 3,
                'name' =>'sara',
                'email' =>'sara@gmail.com',
                'password' => bcrypt('123'),
                'role' => 1,
                'image' => null,
                'status' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],

        ]);
    }
}
