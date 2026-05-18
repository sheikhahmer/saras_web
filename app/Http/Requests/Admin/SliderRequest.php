<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'hashtag' => ['nullable', 'string', 'max:255'],
            'image' => [$this->isMethod('POST') ? 'required' : 'nullable', 'image', 'max:5120'],
        ];
    }
}
