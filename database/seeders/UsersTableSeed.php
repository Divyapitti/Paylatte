<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Divya',
            'email' => 'divya.pitti@mpokket.com',
            'password' => Str::random(7),
           'otp'=>int::random(4),


        ]);
    }
}
