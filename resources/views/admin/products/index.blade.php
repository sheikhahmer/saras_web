@extends('admin.layout')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Products')

@section('content')
    @include('admin.partials.page-header', [
        'eyebrow' => 'Catalog',
        'title' => 'Products',
        'actionUrl' => route('admin.products.create'),
        'actionLabel' => 'Add Product',
    ])

    <div class="admin-card p-5 mb-6">
        <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-col sm:flex-row gap-3">
            <input class="admin-input flex-1" type="search" name="search" value="{{ $search }}" placeholder="Search by title...">
            <button type="submit" class="admin-btn admin-btn-outline">Search</button>
        </form>
    </div>

    <form method="POST" action="{{ route('admin.products.bulk-destroy') }}" id="bulk-form">
        @csrf
        @method('DELETE')
        <div class="admin-card overflow-x-auto">
            <table class="admin-table w-full min-w-[800px]">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-products" class="admin-toggle"></th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $product->id }}" class="product-checkbox admin-toggle"></td>
                            <td>
                                @if(!empty($product->image[0]))
                                    <img class="admin-thumb" src="{{ Storage::url($product->image[0]) }}" alt="">
                                @endif
                            </td>
                            <td>{{ $product->category?->name }}</td>
                            <td>{{ $product->title }}</td>
                            <td>
                                @if($product->has_offer)
                                    Rs {{ number_format($product->new_price, 2) }}
                                @else
                                    Rs {{ number_format($product->price, 2) }}
                                @endif
                            </td>
                            <td class="uppercase text-[0.65rem] tracking-wide">{{ str_replace('_', ' ', $product->is_featured) }}</td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="admin-btn admin-btn-outline !py-2 !px-3">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn-danger !py-2 !px-3">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-10">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->count())
            <div class="p-4 flex flex-wrap items-center justify-between gap-3 border-t border-charcoal/5">
                <button type="submit" class="admin-btn admin-btn-danger" data-confirm="Delete selected products?">Delete Selected</button>
                <div class="admin-pagination">{{ $products->links() }}</div>
            </div>
        @endif
    </form>
@endsection
