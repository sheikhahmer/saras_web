@extends('admin.layout')

@section('title', 'Add Product')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'Catalog', 'title' => 'Add Product'])

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="admin-card p-6 lg:p-8">
        @csrf
        @include('admin.products._form', ['product' => new \App\Models\Product()])
        <div class="mt-8 flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Create Product</button>
            <a href="{{ route('admin.products.index') }}" class="admin-btn admin-btn-outline">Cancel</a>
        </div>
    </form>
@endsection
