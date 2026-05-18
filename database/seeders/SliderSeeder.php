<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CopiesPublicImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    use CopiesPublicImages;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'id' => 1,
                'title' => 'Elegant Macrame Decor',
                'hashtag' => '#SARAS-CREATIONS',
                'public_image' => 'img/slider1.jpg',
            ],
            [
                'id' => 2,
                'title' => 'Premium Cotton Macrame',
                'hashtag' => '#SARAS-CREATIONS',
                'public_image' => 'img/slider-2.jpg',
            ],
        ];

        foreach ($sliders as $slider) {
            $imagePath = $this->copyPublicImage($slider['public_image'], 'slider');
            unset($slider['public_image']);

            DB::table('sliders')->insert([
                ...$slider,
                'image' => $imagePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
