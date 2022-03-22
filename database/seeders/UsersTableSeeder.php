<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('credit')->insert([
            'pan_number' => Str::random(10),
            'credit_score' => rand(200,700),
            'gross_revenue' => rand(100,100000),
            'liabilities' => rand(100,10000000),
            'credit_limit' => rand(10,20000),
            'name' => Str::random(7),
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(7),



        ]);
    }
}
