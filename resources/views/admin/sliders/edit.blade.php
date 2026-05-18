@extends('admin.layout')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Edit Slider')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'Homepage', 'title' => 'Edit Slider'])

    <form method="POST" action="{{ route('admin.sliders.update', $slider) }}" enctype="multipart/form-data" class="admin-card p-6 lg:p-8 max-w-2xl">
        @csrf
        @method('PUT')
        <div class="space-y-5">
            <div>
                <label class="admin-label" for="title">Title</label>
                <input class="admin-input" type="text" name="title" id="title" value="{{ old('title', $slider->title) }}">
            </div>
            <div>
                <label class="admin-label" for="hashtag">Hashtag</label>
                <input class="admin-input" type="text" name="hashtag" id="hashtag" value="{{ old('hashtag', $slider->hashtag) }}">
            </div>
            @if($slider->image)
                <div>
                    <label class="admin-label">Current Image</label>
                    <img src="{{ Storage::url($slider->image) }}" alt="" class="max-w-xs border border-charcoal/10">
                </div>
            @endif
            <div>
                <label class="admin-label" for="image">Replace Image</label>
                <input class="admin-input" type="file" name="image" id="image" accept="image/*">
            </div>
        </div>
        <div class="mt-8 flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Update</button>
            <a href="{{ route('admin.sliders.index') }}" class="admin-btn admin-btn-outline">Cancel</a>
        </div>
    </form>
@endsection
