<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Database\Seeders\Concerns\CopiesPublicImages;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    use CopiesPublicImages;

    /**
     * Copy images from public/img into storage (gallery/) and create gallery records.
     *
     * @var list<array{file: string, title: string|null}>
     */
    private array $items = [
        ['file' => 'img/banner-img1.webp', 'title' => 'Collection highlight'],
        ['file' => 'img/banner-img2.avif', 'title' => 'Macramé detail'],
        ['file' => 'img/banner-img3.webp', 'title' => 'Handcrafted texture'],
        ['file' => 'img/banner-img5.webp', 'title' => 'Natural fibers'],
        ['file' => 'img/banner-img6.webp', 'title' => 'Studio styling'],
        ['file' => 'img/banner-img-7.png', 'title' => 'Wall décor'],
        ['file' => 'img/banner-img8.jpg', 'title' => 'Cotton cords'],
        ['file' => 'img/banner-img-9.png', 'title' => 'Boho accents'],
        ['file' => 'img/cotton-cord.jpg', 'title' => 'Twisted cotton cord'],
        ['file' => 'img/cord.jpeg', 'title' => 'Premium cord'],
        ['file' => 'img/cord-2.jpeg', 'title' => 'Cord spool'],
        ['file' => 'img/cord-3.jpeg', 'title' => 'Soft cotton'],
        ['file' => 'img/slide1.png', 'title' => 'Slide showcase'],
        ['file' => 'img/slide2.jpeg', 'title' => 'Artisan piece'],
        ['file' => 'img/slider1.jpg', 'title' => 'Hero moment'],
        ['file' => 'img/slider-2.jpg', 'title' => 'Elegant drape'],
        ['file' => 'img/slider3.jpeg', 'title' => 'Light & texture'],
        ['file' => 'img/slider4.jpg', 'title' => 'Home styling'],
        ['file' => 'img/Wooden-Beads_10mm_CloudDen_1_LS_LR_6162dc6c-4f25-462b-8078-1f41c3586979_1200x1200.jpg', 'title' => 'Wooden beads'],
        ['file' => 'img/WhatsApp Image 2026-03-08 at 7.50.30 PM.jpeg', 'title' => 'Custom work'],
        ['file' => 'img/WhatsApp Image 2026-03-08 at 8.22.09 PM.jpeg', 'title' => 'Behind the scenes'],
        ['file' => 'img/Gemini_Generated_Image_q75pcfq75pcfq75p.png', 'title' => 'Design inspiration'],
        ['file' => 'img/Gemini_Generated_Image_hmr3prhmr3prhmr3-Picsart-AiImageEnhancer.png', 'title' => 'Creative mood'],
    ];

    public function run(): void
    {
        GalleryImage::query()->delete();

        $sort = 0;

        foreach ($this->items as $row) {
            $path = $this->copyPublicImage($row['file'], 'gallery');

            GalleryImage::create([
                'image' => $path,
                'title' => $row['title'],
                'sort_order' => ++$sort,
            ]);
        }
    }
}
