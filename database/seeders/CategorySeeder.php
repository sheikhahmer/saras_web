<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Cotton Cord',
            'Wooden Beads',
            'Wooden Rings',
            'Steel Rings',
            'Wooden Dowels',
            'Wooden Shelf',
            'Bags',
            'Bookmarks',
            'Bracelets',
            'Christmas',
            'Circles',
            'Flowers',
            'Keychains',
            'Lighting',
            'Patterns',
            'Plant Hanger',
            'Wall Hanging',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
