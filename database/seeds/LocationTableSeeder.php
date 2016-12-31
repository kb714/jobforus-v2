<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'weight' => 0,
            'name'  => 'Regiones'
        ]);
        DB::table('locations')->insert([
            'weight' => 1,
            'name'  => 'Todo Chile'
        ]);
        DB::table('locations')->insert([
            'weight' => 2,
            'name'  => 'Extranjero'
        ]);
        DB::table('locations')->insert([
            'weight' => 3,
            'name'  => 'Dentro y/o fuera de Chile'
        ]);
    }
}
