<?php

use Illuminate\Database\Seeder;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->insert([
            'weight' => 0,
            'name'  => 'Fin de semana'
        ]);
        DB::table('job_types')->insert([
            'weight' => 1,
            'name'  => 'Freelance'
        ]);
        DB::table('job_types')->insert([
            'weight' => 2,
            'name'  => 'Home office'
        ]);
        DB::table('job_types')->insert([
            'weight' => 3,
            'name'  => 'Segundo empleo'
        ]);
        DB::table('job_types')->insert([
            'weight' => 4,
            'name'  => 'Full time'
        ]);
        DB::table('job_types')->insert([
            'weight' => 5,
            'name'  => 'Part time'
        ]);
        DB::table('job_types')->insert([
            'weight' => 6,
            'name'  => 'Varios'
        ]);
    }
}
