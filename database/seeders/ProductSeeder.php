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
        for ($i = 3; $i < 50; $i++) {
            $name = 'Quần' . $i;
            DB::table('product')->insert([
                'id' => $i,
                'name' => $name,
                'slug' => 'cháy',
                'short_desc' => 'vjp',
                'regular_price' => '255000',
                'sale_price' => '225000',
                'image' => '1715357242.jpg',
                'quantity' => '1',
                'category_id' => '1',
                'manufacturers_id' => '1',
                'trending' => '0',
            ]);
        }
    }
}
