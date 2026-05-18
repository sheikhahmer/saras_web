<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ManagesPublicDiskImages
{
    /**
     * @param  list<UploadedFile>  $files
     * @return list<string>
     */
    protected function storeUploadedImages(array $files, string $directory): array
    {
        $paths = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                $paths[] = $file->store($directory, 'public');
            }
        }

        return $paths;
    }

    /**
     * @param  list<string>|null  $current
     * @return list<string>
     */
    protected function syncStoredImages(array $keep, ?array $current, array $newUploads, string $directory): array
    {
        $current = $current ?? [];
        $keep = array_values(array_intersect($current, $keep));
        $paths = array_merge($keep, $this->storeUploadedImages($newUploads, $directory));

        foreach (array_diff($current, $paths) as $removed) {
            Storage::disk('public')->delete($removed);
        }

        return $paths;
    }

    protected function deleteStoredImages(?array $paths): void
    {
        foreach ($paths ?? [] as $path) {
            Storage::disk('public')->delete($path);
        }
    }

    protected function storeSingleImage(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    protected function replaceSingleImage(?string $current, UploadedFile $file, string $directory): string
    {
        if ($current) {
            Storage::disk('public')->delete($current);
        }

        return $this->storeSingleImage($file, $directory);
    }
}
