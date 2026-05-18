@extends('admin.layout')

@section('title', 'Edit Banner')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'Homepage', 'title' => 'Edit Banner'])

    <form method="POST" action="{{ route('admin.banners.update', $banner) }}" class="admin-card p-6 lg:p-8 max-w-xl">
        @csrf
        @method('PUT')
        <div>
            <label class="admin-label" for="name">Name</label>
            <input class="admin-input" type="text" name="name" id="name" value="{{ old('name', $banner->name) }}" required>
        </div>
        <div class="mt-8 flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Update</button>
            <a href="{{ route('admin.banners.index') }}" class="admin-btn admin-btn-outline">Cancel</a>
        </div>
    </form>
@endsection
