@php
    use Illuminate\Support\Facades\Storage;

    $hasOffer = old('has_offer', $product->has_offer ?? false);
    $hasOffer = filter_var($hasOffer, FILTER_VALIDATE_BOOLEAN) || $hasOffer === 1 || $hasOffer === '1';
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    <div>
        <label class="admin-label" for="category_id">Category</label>
        <select class="admin-select" name="category_id" id="category_id" required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="admin-label" for="is_featured">Product Status</label>
        <select class="admin-select" name="is_featured" id="is_featured" required>
            <option value="">Select status</option>
            @foreach($statuses as $value => $label)
                <option value="{{ $value }}" @selected(old('is_featured', $product->is_featured ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="admin-label" for="title">Title</label>
        <input class="admin-input" type="text" name="title" id="title" value="{{ old('title', $product->title ?? '') }}">
    </div>
</div>

<div class="mt-5">
    <label class="admin-label" for="description">Description</label>
    <textarea class="admin-textarea min-h-[180px]" name="description" id="description">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5 items-end">
    <div class="price-field {{ $hasOffer ? 'hidden' : '' }}">
        <label class="admin-label" for="price">Price (Rs)</label>
        <input class="admin-input" type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $product->price ?? '') }}">
    </div>
    <div>
        <label class="flex items-center gap-2 text-sm font-semibold">
            <input type="checkbox" name="has_offer" id="has_offer" value="1" class="admin-toggle" @checked($hasOffer)>
            Has Offer
        </label>
    </div>
    <div class="offer-fields {{ $hasOffer ? '' : 'hidden' }}">
        <label class="admin-label" for="old_price">Old Price (Rs)</label>
        <input class="admin-input" type="number" step="0.01" min="0" name="old_price" id="old_price" value="{{ old('old_price', $product->old_price ?? '') }}">
    </div>
    <div class="offer-fields {{ $hasOffer ? '' : 'hidden' }}">
        <label class="admin-label" for="new_price">New Price (Rs)</label>
        <input class="admin-input" type="number" step="0.01" min="0" name="new_price" id="new_price" value="{{ old('new_price', $product->new_price ?? '') }}">
    </div>
</div>

<div class="mt-6">
    <label class="admin-label">Images</label>
    @if(isset($product) && !empty($product->image))
        <div class="image-preview-grid mb-4">
            @foreach($product->image as $path)
                <div class="image-preview-item">
                    <img src="{{ Storage::url($path) }}" alt="Product image">
                    <label>
                        <input type="checkbox" name="keep_images[]" value="{{ $path }}" checked>
                        Keep
                    </label>
                </div>
            @endforeach
        </div>
    @endif
    <input class="admin-input" type="file" name="images[]" id="images" accept="image/*" multiple {{ isset($product) ? '' : 'required' }}>
    <p class="text-xs text-gray-500 mt-2">Upload one or more images. On edit, uncheck images you want to remove.</p>
</div>
