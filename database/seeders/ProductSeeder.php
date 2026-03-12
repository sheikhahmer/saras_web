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
            [
                'id' => 1,
                'category_id' => 1,
                'title' => 'Macrame Twisted Cotton Cord',
                'description' => 'Premium Pure Cotton Cord',
                'price' => null,
                'has_offer' => 1,
                'old_price' => 1300.00,
                'new_price' => 1100.00,
                'is_featured' => 'featured',
                'tags' => 'Macrame, Wall Art, Handcraft, Cotton, Decor',
                'image' => json_encode([
                    'product/01KK1EMJZ7MTR2E7SYVYKQP50R.jpg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'category_id' => 2,
                'title' => 'Macrame Wall Hanging',
                'description' => 'Get your desired wall decor',
                'price' => null,
                'has_offer' => 1,
                'old_price' => 1500.00,
                'new_price' => 1100.00,
                'is_featured' => 'featured',
                'tags' => 'Macrame, Wall Art, Handcraft, Cotton, Decor',
                'image' => json_encode([
                    'product/01KK1ENR3R8SWX6V9KR9XNA473.avif',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'category_id' => 3,
                'title' => 'Planter Hanger',
                'description' => 'Planter Hanger',
                'price' => null,
                'has_offer' => 1,
                'old_price' => 1200.00,
                'new_price' => 1100.00,
                'is_featured' => 'featured',
                'tags' => 'Macrame, Wall Art, Handcraft, Cotton, Decor',
                'image' => json_encode([
                    'product/01KK1ENSEEK50T6ZVKB4CZ4AXN.png',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'category_id' => 4,
                'title' => 'Macrame Bags',
                'description' => 'Macrame Bags',
                'price' => 2000.00,
                'has_offer' => 0,
                'old_price' => null,
                'new_price' => null,
                'is_featured' => 'featured',
                'tags' => 'Macrame, Wall Art, Handcraft, Cotton, Decor',
                'image' => json_encode([
                    'product/01KK1ENVSRAT4B39DRMXJRFQG7.webp',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'category_id' => 5,
                'title' => 'Wooden Beads',
                'description' => 'Wooden Beads',
                'price' => 200.00,
                'has_offer' => 0,
                'old_price' => null,
                'new_price' => null,
                'is_featured' => 'featured',
                'tags' => 'Macrame, Wall Art, Handcraft, Cotton, Decor',
                'image' => json_encode([
                    'product/01KK1EP2744AGFFPXVE0MNZ1AY.webp',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
