<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            [
                'id' => 1,
                'title' => 'Elegant Macrame Decor',
                'image' => 'slider/01KK1CBN01JN53AWEPJTHY174P.jpg',
                'hashtag' => '#SARAS-CREATIONS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Premium Cotton Macrame',
                'image' => 'slider/01KK1CR2QR50JGMWT7YXTV79SA.jpg',
                'hashtag' => '#SARAS-CREATIONS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
