<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'user_type_id'  => 4, //Person
            'weight'        => 0,
            'name'          => 'Gratuita',
            'price'         => 0
        ]);

        DB::table('plans')->insert([
            'user_type_id'  => 6, //Company
            'weight'        => 0,
            'name'          => 'Gratuita',
            'price'         => 0
        ]);

        DB::table('plans')->insert([
            'user_type_id'  => 6, //Company
            'weight'        => 10,
            'name'          => 'Mensual',
            'price'         => 20000
        ]);
    }
}
