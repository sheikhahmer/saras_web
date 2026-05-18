<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CopiesPublicImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    use CopiesPublicImages;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
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
                'public_images' => ['img/cotton-cord.jpg', 'img/cord-2.jpeg'],
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
                'public_images' => ['img/banner-img2.avif'],
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
                'public_images' => ['img/banner-img-7.png'],
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
                'public_images' => ['img/banner-img3.webp'],
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
                'public_images' => ['img/Wooden-Beads_10mm_CloudDen_1_LS_LR_6162dc6c-4f25-462b-8078-1f41c3586979_1200x1200.jpg'],
            ],
        ];

        foreach ($products as $product) {
            $imagePaths = $this->copyPublicImages($product['public_images'], 'product');
            unset($product['public_images']);

            $slugBase = Str::slug((string) ($product['title'] ?? '')) ?: 'product-'.$product['id'];

            DB::table('products')->insert([
                ...$product,
                'slug' => $slugBase,
                'image' => json_encode($imagePaths),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
