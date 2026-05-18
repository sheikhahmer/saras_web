<?php

namespace Database\Seeders\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait CopiesPublicImages
{
    /**
     * Copy a file from public/ into storage/app/public and return the stored path.
     */
    protected function copyPublicImage(string $publicPath, string $directory): string
    {
        $source = public_path($publicPath);

        if (! File::exists($source)) {
            throw new \RuntimeException("Seeder image not found: {$publicPath}");
        }

        $destination = $directory.'/'.basename($publicPath);

        Storage::disk('public')->put($destination, File::get($source));

        return $destination;
    }

    /**
     * @param  list<string>  $publicPaths
     * @return list<string>
     */
    protected function copyPublicImages(array $publicPaths, string $directory): array
    {
        return array_map(
            fn (string $path) => $this->copyPublicImage($path, $directory),
            $publicPaths,
        );
    }
}
