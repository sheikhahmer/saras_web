@extends('admin.layout')

@section('title', 'Categories')

@section('content')
    @include('admin.partials.page-header', [
        'eyebrow' => 'Catalog',
        'title' => 'Categories',
        'actionUrl' => route('admin.categories.create'),
        'actionLabel' => 'Add Category',
    ])

    <div class="admin-card overflow-x-auto">
        <table class="admin-table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products_count }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="admin-btn admin-btn-outline !py-2 !px-3">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn-danger !py-2 !px-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-10">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $categories->links() }}</div>
    </div>
@endsection
