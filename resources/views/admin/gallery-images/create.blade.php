@extends('admin.layout')

@section('title', 'Add Gallery Image')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'Website', 'title' => 'Add Gallery Image'])

    <form method="POST" action="{{ route('admin.gallery-images.store') }}" enctype="multipart/form-data" class="admin-card p-6 lg:p-8 max-w-2xl">
        @csrf
        <div class="space-y-5">
            <div>
                <label class="admin-label" for="title">Title <span class="text-gray-400 font-normal">(optional)</span></label>
                <input class="admin-input" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Shown on hover and in lightbox">
            </div>
            <div>
                <label class="admin-label" for="sort_order">Sort order <span class="text-gray-400 font-normal">(optional)</span></label>
                <input class="admin-input" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order') }}" min="0" placeholder="Leave blank — added to end">
            </div>
            <div>
                <label class="admin-label" for="image">Image</label>
                <input class="admin-input" type="file" name="image" id="image" accept="image/*" required>
            </div>
        </div>
        <div class="mt-8 flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Save</button>
            <a href="{{ route('admin.gallery-images.index') }}" class="admin-btn admin-btn-outline">Cancel</a>
        </div>
    </form>
@endsection
