<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $hasOffer = $this->boolean('has_offer');

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'is_featured' => ['required', Rule::in([
                Product::BEST_SELLER,
                Product::NEW_ARRIVAL,
                Product::FEATURED,
            ])],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'has_offer' => ['sometimes', 'boolean'],
            'price' => [$hasOffer ? 'nullable' : 'nullable', 'numeric', 'min:0'],
            'old_price' => [$hasOffer ? 'nullable' : 'nullable', 'numeric', 'min:0'],
            'new_price' => [$hasOffer ? 'nullable' : 'nullable', 'numeric', 'min:0'],
            'images' => [$this->isMethod('POST') ? 'required' : 'nullable', 'array'],
            'images.*' => ['image', 'max:5120'],
            'keep_images' => ['nullable', 'array'],
            'keep_images.*' => ['string'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'has_offer' => $this->boolean('has_offer'),
        ]);
    }

    public function productAttributes(): array
    {
        $hasOffer = $this->boolean('has_offer');

        return [
            'category_id' => $this->integer('category_id'),
            'is_featured' => $this->string('is_featured'),
            'title' => $this->input('title'),
            'description' => $this->input('description'),
            'has_offer' => $hasOffer ? 1 : 0,
            'price' => $hasOffer ? null : $this->input('price'),
            'old_price' => $hasOffer ? $this->input('old_price') : null,
            'new_price' => $hasOffer ? $this->input('new_price') : null,
        ];
    }
}
