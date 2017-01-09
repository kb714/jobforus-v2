<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(JobTypeTableSeeder::class);
        //$this->call(LocationTableSeeder::class);
        //$this->call(RegionTableSeeder::class);
        //$this->call(PlanTableSeeder::class);
        //$this->call(AdminTableSeeder::class);
        $this->call(PageTableSeeder::class);
    }
}
