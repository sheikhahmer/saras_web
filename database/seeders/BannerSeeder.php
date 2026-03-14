<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $banners = [
            'New Collection',
            'Trusted Shipping',
            'Handycraft',
            '2026 Collection',
            'Sustainable Materials',
            'Premium Cotton Cords',
            'Handmade Macrame',
            'Eco-Friendly Supplies',
            'Custom Macrame Designs',
            'Decorative Wall Hangings',
            'Plant Hanger Creations',
        ];

        foreach ($banners as $banner) {
            DB::table('banners')->insert([
                'name' => $banner,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
