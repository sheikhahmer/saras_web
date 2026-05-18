<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'image',
        'title',
        'sort_order',
    ];

    public function getDisplayCaptionAttribute(): string
    {
        if ($this->title) {
            return $this->title;
        }

        $base = pathinfo($this->image, PATHINFO_FILENAME);

        return ucwords(str_replace(['_', '-'], ' ', $base));
    }
}
