@extends('admin.layout')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Gallery Images')

@section('content')
    @include('admin.partials.page-header', [
        'eyebrow' => 'Website',
        'title' => 'Gallery',
        'actionUrl' => route('admin.gallery-images.create'),
        'actionLabel' => 'Add Image',
    ])

    <div class="admin-card overflow-x-auto">
        <table class="admin-table w-full min-w-[640px]">
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Sort</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($images as $row)
                    <tr>
                        <td>
                            <img class="admin-thumb !w-[72px] !h-[72px]" src="{{ Storage::url($row->image) }}" alt="">
                        </td>
                        <td>{{ $row->title ?: '—' }}</td>
                        <td>{{ $row->sort_order }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.gallery-images.edit', $row) }}" class="admin-btn admin-btn-outline !py-2 !px-3">Edit</a>
                                <form action="{{ route('admin.gallery-images.destroy', $row) }}" method="POST" onsubmit="return confirm('Remove this gallery image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn-danger !py-2 !px-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-10">No gallery images yet. Add images to show them on the public gallery page.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 admin-pagination">{{ $images->links() }}</div>
    </div>
@endsection
