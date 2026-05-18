<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'whatsapp_number',
        'email',
        'facebook_url',
        'instagram_url',
        'pinterest_url',
        'twitter_url',
        'youtube_url',
        'snapchat_url',
        'tiktok_url',
    ];

    public static function current(): self
    {
        $row = static::query()->first();

        return $row ?? static::query()->create([]);
    }

    /**
     * Digits-only number for WhatsApp click-to-chat (wa.me / api.whatsapp.com).
     */
    public function whatsappDigits(): string
    {
        $raw = $this->whatsapp_number ?: $this->phone;

        return preg_replace('/\D/', '', (string) $raw);
    }

    /**
     * WhatsApp chat digits from CMS, falling back to env/config when unset.
     */
    public function whatsappDigitsOrConfigFallback(): string
    {
        $digits = $this->whatsappDigits();

        if ($digits !== '') {
            return $digits;
        }

        return preg_replace('/\D/', '', (string) config('services.whatsapp.business_number', ''));
    }
}
