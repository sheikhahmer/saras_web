@extends('admin.layout')

@section('title', 'Banners')

@section('content')
    @include('admin.partials.page-header', [
        'eyebrow' => 'Homepage',
        'title' => 'Marquee Banners',
        'actionUrl' => route('admin.banners.create'),
        'actionLabel' => 'Add Banner',
    ])

    <div class="admin-card overflow-x-auto">
        <table class="admin-table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                    <tr>
                        <td>{{ $banner->name }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.banners.edit', $banner) }}" class="admin-btn admin-btn-outline !py-2 !px-3">Edit</a>
                                <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Delete this banner?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn-danger !py-2 !px-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-gray-500 py-10">No banners found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $banners->links() }}</div>
    </div>
@endsection
