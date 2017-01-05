<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Alexis Aguirre',
            'username' => 'acvp',
            'email'  => 'alexis@acvp.cl',
            'password' => \Illuminate\Support\Facades\Hash::make('123123')
        ]);
    }
}
