<?php

namespace App\Services;

use App\Models\Product;
use GdImage;
use Illuminate\Support\Facades\Storage;

class ProductInquiryCardGenerator
{
    private const WIDTH = 900;

    private const HEIGHT = 1120;

    public function renderPng(Product $product): string
    {
        $product->loadMissing('category');

        if (! function_exists('imagecreatetruecolor')) {
            abort(501, 'PHP image generation (GD) is required for inquiry cards.');
        }

        $font = $this->fontPath();

        $im = imagecreatetruecolor(self::WIDTH, self::HEIGHT);
        $cream = imagecolorallocate($im, 250, 246, 241);
        $charcoal = imagecolorallocate($im, 30, 30, 30);
        $rouge = imagecolorallocate($im, 217, 79, 79);
        $white = imagecolorallocate($im, 255, 255, 255);
        $muted = imagecolorallocate($im, 96, 96, 96);
        $pink = imagecolorallocate($im, 255, 222, 222);
        $border = imagecolorallocate($im, 220, 215, 208);
        imagefill($im, 0, 0, $cream);

        imagefilledrectangle($im, 0, 0, self::WIDTH, 92, $rouge);
        $this->centerText($im, $font, 24, 52, 'SARAS CREATIONS', $white);
        $this->centerText($im, $font, 13, 80, 'Product inquiry summary', $pink);

        $bx = 50;
        $by = 112;
        $bw = 800;
        $bh = 400;
        imagefilledrectangle($im, $bx, $by, $bx + $bw, $by + $bh, $white);
        imagerectangle($im, $bx, $by, $bx + $bw, $by + $bh, $border);
        $this->pasteFitImage($im, $product, $bx + 10, $by + 10, $bw - 20, $bh - 20);

        $y = $by + $bh + 40;
        $x = 56;
        $maxW = self::WIDTH - 112;

        $title = str_replace('*', '', strip_tags((string) $product->title));
        foreach ($this->wrapText($title, $font, 26, $maxW) as $line) {
            imagettftext($im, 26, 0, $x, $y, $charcoal, $font, $line);
            $y += 34;
        }
        $y += 8;

        $sku = 'SC-'.str_pad((string) $product->id, 5, '0', STR_PAD_LEFT);
        $detailLines = ['SKU: '.$sku];
        if ($product->category) {
            $detailLines[] = 'Category: '.strip_tags((string) $product->category->name);
        }
        if ($product->has_offer && $product->old_price && $product->new_price) {
            $pct = (int) round((1 - (float) $product->new_price / (float) $product->old_price) * 100);
            $detailLines[] = 'Offer price: Rs '.number_format((float) $product->new_price, 2);
            $detailLines[] = 'Regular price: Rs '.number_format((float) $product->old_price, 2);
            $detailLines[] = 'You save: Rs '.number_format((float) $product->old_price - (float) $product->new_price, 2)." ({$pct}%)";
        } else {
            $detailLines[] = 'Price: Rs '.number_format((float) ($product->price ?? 0), 2);
        }

        foreach ($detailLines as $line) {
            imagettftext($im, 17, 0, $x, $y, $muted, $font, $line);
            $y += 28;
        }

        $y += 14;
        $url = route('product.show', ['product' => $product->slug]);
        imagettftext($im, 15, 0, $x, $y, $rouge, $font, 'Product link');
        $y += 26;
        foreach ($this->wrapText($url, $font, 14, $maxW) as $line) {
            imagettftext($im, 14, 0, $x, $y, $charcoal, $font, $line);
            $y += 22;
        }

        $y += 20;
        foreach ($this->wrapText(
            'Please send this card via WhatsApp and share your full name, phone number, and desired quantity. Ask about stock, payment options, and delivery.',
            $font,
            15,
            $maxW
        ) as $line) {
            imagettftext($im, 15, 0, $x, $y, $charcoal, $font, $line);
            $y += 24;
        }

        $fy = self::HEIGHT - 36;
        imageline($im, 56, $fy - 28, self::WIDTH - 56, $fy - 28, $border);
        $this->centerText($im, $font, 12, $fy, 'Thank you for choosing SARAS CREATIONS', $muted);

        ob_start();
        imagepng($im, null, 7);
        $png = ob_get_clean();
        imagedestroy($im);

        return $png;
    }

    private function centerText(GdImage $im, string $font, float $size, int $y, string $text, int $color): void
    {
        $bbox = imagettfbbox($size, 0, $font, $text);
        $w = (int) ($bbox[2] - $bbox[0]);
        $x = (int) ((self::WIDTH - $w) / 2);
        imagettftext($im, $size, 0, $x, $y, $color, $font, $text);
    }

    /**
     * @return list<string>
     */
    private function wrapText(string $text, string $font, float $size, float $maxWidth): array
    {
        $text = trim(preg_replace('/\s+/u', ' ', $text) ?? '');
        if ($text === '') {
            return [''];
        }

        $words = preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY) ?: [];
        $lines = [];
        $line = '';

        foreach ($words as $word) {
            $test = $line === '' ? $word : $line.' '.$word;
            $bbox = imagettfbbox($size, 0, $font, $test);
            $w = (float) ($bbox[2] - $bbox[0]);
            if ($w > $maxWidth && $line !== '') {
                $lines[] = $line;
                $line = $word;
            } else {
                $line = $test;
            }
        }

        if ($line !== '') {
            $lines[] = $line;
        }

        return $lines;
    }

    private function pasteFitImage(GdImage $im, Product $product, int $dx, int $dy, int $maxW, int $maxH): void
    {
        $raw = $product->image;
        /** @var array<int, mixed>|null $images */
        $images = is_string($raw) ? json_decode($raw, true) : $raw;
        if (! is_array($images) || empty($images[0]) || ! is_string($images[0])) {
            return;
        }

        $path = Storage::disk('public')->path($images[0]);
        if (! is_file($path)) {
            return;
        }

        $data = @file_get_contents($path);
        if ($data === false) {
            return;
        }

        $src = @imagecreatefromstring($data);
        if (! $src instanceof GdImage) {
            return;
        }

        $sw = imagesx($src);
        $sh = imagesy($src);
        if ($sw < 1 || $sh < 1) {
            imagedestroy($src);

            return;
        }

        $scale = min($maxW / $sw, $maxH / $sh);
        $dw = max(1, (int) floor($sw * $scale));
        $dh = max(1, (int) floor($sh * $scale));
        $ox = $dx + (int) (($maxW - $dw) / 2);
        $oy = $dy + (int) (($maxH - $dh) / 2);
        imagecopyresampled($im, $src, $ox, $oy, 0, 0, $dw, $dh, $sw, $sh);
        imagedestroy($src);
    }

    private function fontPath(): string
    {
        $candidates = [
            resource_path('fonts/DejaVuSans.ttf'),
            resource_path('fonts/LiberationSans-Regular.ttf'),
            '/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf',
        ];
        foreach ($candidates as $path) {
            if (is_file($path)) {
                return $path;
            }
        }

        abort(500, 'No TTF font found. Place DejaVuSans.ttf in resources/fonts/.');
    }
}
