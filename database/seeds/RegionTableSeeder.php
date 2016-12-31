<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'weight' => 0,
            'name'  => 'Arica y Parinacota',
            'ordinal' => 'XV'
        ]);
        DB::table('regions')->insert([
            'weight' => 1,
            'name'  => 'Tarapacá',
            'ordinal' => 'I'
        ]);
        DB::table('regions')->insert([
            'weight' => 2,
            'name'  => 'Antofagasta',
            'ordinal' => 'II'
        ]);
        DB::table('regions')->insert([
            'weight' => 3,
            'name'  => 'Atacama',
            'ordinal' => 'III'
        ]);
        DB::table('regions')->insert([
            'weight' => 4,
            'name'  => 'Coquimbo',
            'ordinal' => 'IV'
        ]);
        DB::table('regions')->insert([
            'weight' => 5,
            'name'  => 'Valparaiso',
            'ordinal' => 'V'
        ]);
        DB::table('regions')->insert([
            'weight' => 6,
            'name'  => 'Metropolitana de Santiago',
            'ordinal' => 'RM'
        ]);
        DB::table('regions')->insert([
            'weight' => 7,
            'name'  => 'Libertador General Bernardo O\'Higgins',
            'ordinal' => 'VI'
        ]);
        DB::table('regions')->insert([
            'weight' => 8,
            'name'  => 'Maule',
            'ordinal' => 'VII'
        ]);
        DB::table('regions')->insert([
            'weight' => 9,
            'name'  => 'Biobío',
            'ordinal' => 'VIII'
        ]);
        DB::table('regions')->insert([
            'weight' => 10,
            'name'  => 'La Araucanía',
            'ordinal' => 'IX'
        ]);
        DB::table('regions')->insert([
            'weight' => 11,
            'name'  => 'Los Ríos',
            'ordinal' => 'XIV'
        ]);
        DB::table('regions')->insert([
            'weight' => 12,
            'name'  => 'Los Lagos',
            'ordinal' => 'X'
        ]);
        DB::table('regions')->insert([
            'weight' => 13,
            'name'  => 'Aisén del General Carlos Ibáñez del Campo',
            'ordinal' => 'XI'
        ]);
        DB::table('regions')->insert([
            'weight' => 14,
            'name'  => 'Magallanes y de la Antártica Chilena',
            'ordinal' => 'XII'
        ]);
    }
}
