<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            'name' => 'ALCATEL',
            'brand_id' => '20',
            'counter' => '2',
        ]);

        DB::table('types')->insert([
            'name' => 'AOC',
            'brand_id' => '19',
            'counter' => '3',
        ]);

        DB::table('types')->insert([
            'name' => 'Musica',
            'brand_id' => '4',
            'counter' => '4',
        ]);

        DB::table('types')->insert([
            'name' => 'Motorola',
            'brand_id' => '23',
            'counter' => '5',
        ]);
    }
}
