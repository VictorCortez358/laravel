<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Product 1',
            'description' => 'Description of product 1',
            'price' => 100.00,
        ]);

        DB::table('products')->insert([
            'name' => 'Product 2',
            'description' => 'Description of product 2',
            'price' => 200.00,
        ]);

        DB::table('products')->insert([
            'name' => 'Product 3',
            'description' => 'Description of product 3',
            'price' => 300.00,
        ]);
    }
}
