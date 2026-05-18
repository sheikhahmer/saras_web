<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'address' => ['nullable', 'string', 'max:2000'],
            'phone' => ['nullable', 'string', 'max:80'],
            'whatsapp_number' => ['nullable', 'string', 'max:80'],
            'email' => ['nullable', 'email', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:512'],
            'instagram_url' => ['nullable', 'url', 'max:512'],
            'pinterest_url' => ['nullable', 'url', 'max:512'],
            'twitter_url' => ['nullable', 'url', 'max:512'],
            'youtube_url' => ['nullable', 'url', 'max:512'],
            'snapchat_url' => ['nullable', 'url', 'max:512'],
            'tiktok_url' => ['nullable', 'url', 'max:512'],
        ];
    }
}
