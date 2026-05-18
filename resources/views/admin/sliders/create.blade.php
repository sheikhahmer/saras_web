@extends('admin.layout')

@section('title', 'Add Slider')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'Homepage', 'title' => 'Add Slider'])

    <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data" class="admin-card p-6 lg:p-8 max-w-2xl">
        @csrf
        <div class="space-y-5">
            <div>
                <label class="admin-label" for="title">Title</label>
                <input class="admin-input" type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div>
                <label class="admin-label" for="hashtag">Hashtag</label>
                <input class="admin-input" type="text" name="hashtag" id="hashtag" value="{{ old('hashtag') }}">
            </div>
            <div>
                <label class="admin-label" for="image">Image</label>
                <input class="admin-input" type="file" name="image" id="image" accept="image/*" required>
            </div>
        </div>
        <div class="mt-8 flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Create</button>
            <a href="{{ route('admin.sliders.index') }}" class="admin-btn admin-btn-outline">Cancel</a>
        </div>
    </form>
@endsection
