<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;
use DB;

class Seederfile extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('debit')->insert([
            'pan_number' => Str::random(10),
            'credit_score' => rand(200,700),
            'gross_revenue' => rand(100,100000),
            'name' => Str::random(7),
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(7),



        ]);
    }
}
