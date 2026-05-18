@extends('admin.layout')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Edit Gallery Image')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'Website', 'title' => 'Edit Gallery Image'])

    <form method="POST" action="{{ route('admin.gallery-images.update', $image) }}" enctype="multipart/form-data" class="admin-card p-6 lg:p-8 max-w-2xl">
        @csrf
        @method('PUT')
        <div class="space-y-5">
            <div class="flex items-start gap-4">
                <img src="{{ Storage::url($image->image) }}" alt="" class="w-28 h-28 object-cover border border-charcoal/10 shrink-0">
                <div>
                    <label class="admin-label" for="title">Title <span class="text-gray-400 font-normal">(optional)</span></label>
                    <input class="admin-input" type="text" name="title" id="title" value="{{ old('title', $image->title) }}" placeholder="Caption">
                </div>
            </div>
            <div>
                <label class="admin-label" for="sort_order">Sort order</label>
                <input class="admin-input" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $image->sort_order) }}" min="0">
            </div>
            <div>
                <label class="admin-label" for="image">Replace image <span class="text-gray-400 font-normal">(optional)</span></label>
                <input class="admin-input" type="file" name="image" id="image" accept="image/*">
            </div>
        </div>
        <div class="mt-8 flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Update</button>
            <a href="{{ route('admin.gallery-images.index') }}" class="admin-btn admin-btn-outline">Cancel</a>
        </div>
    </form>
@endsection
