@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'Catalog', 'title' => 'Edit Product'])

    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="admin-card p-6 lg:p-8">
        @csrf
        @method('PUT')
        @include('admin.products._form')
        <div class="mt-8 flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="admin-btn admin-btn-outline">Cancel</a>
        </div>
    </form>
@endsection
