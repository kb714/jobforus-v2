<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'name' => 'Cómo funciona',
            'slug'  => 'como-funciona',
            'content' => 'test'
        ]);
        DB::table('pages')->insert([
            'name' => 'Transparentes',
            'slug'  => 'transparentes',
            'content' => 'test'
        ]);
        DB::table('pages')->insert([
            'name' => 'Contacto',
            'slug'  => 'contacto',
            'content' => 'test'
        ]);
    }
}
