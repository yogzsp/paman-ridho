<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorisSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            ['title' => 'Kursi'],
            ['title' => 'Sofa'],
            ['title' => 'Barstool'],
            ['title' => 'Meja Bulat'],
            ['title' => 'Meja Kotak'],
            ['title' => 'Pendingin'],
            ['title' => 'Multimedia'],
            ['title' => 'Flooring'],
            ['title' => 'Catering'],
        ];

        // Insert data into the "products" table
        DB::table('categoris')->insert($products);
    }
}
