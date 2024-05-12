<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            $product = Product::create([
                'name' => 'Product ' . $i,
                'slug' => 'product-' . $i,
                'short_desc' => 'Short description for Product ' . $i,
                'image' => null,
                'regular_price' => 100.0,
                'sale_price' => 100.0,
                'status' => 0,
                'description' => 'Description for Product ' . $i,
                'quantity' => 1,
                'trending' => 0,
                'featured' => 0,
                'best_seller' => 0,
                'category_id' => 1,
                'manufacturers_id' => 1,
            ]);

            $url = $faker->imageUrl();
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $url,
            ]);
        }
    }

}
