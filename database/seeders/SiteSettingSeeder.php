<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        if (SiteSetting::query()->exists()) {
            return;
        }

        SiteSetting::query()->create([
            'address' => "123 Artisan Lane, Craft District\nCity 10001",
            'phone' => '+92 3166448508',
            'whatsapp_number' => '923166448508',
            'email' => 'hello@sarascreations.com',
            'facebook_url' => null,
            'instagram_url' => null,
            'pinterest_url' => null,
            'twitter_url' => null,
            'youtube_url' => null,
            'snapchat_url' => null,
            'tiktok_url' => null,
        ]);
    }
}
