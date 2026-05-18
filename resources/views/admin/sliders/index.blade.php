@extends('admin.layout')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('title', 'Sliders')

@section('content')
    @include('admin.partials.page-header', [
        'eyebrow' => 'Homepage',
        'title' => 'Sliders',
        'actionUrl' => route('admin.sliders.create'),
        'actionLabel' => 'Add Slider',
    ])

    <div class="admin-card overflow-x-auto">
        <table class="admin-table w-full">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Hashtag</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sliders as $slider)
                    <tr>
                        <td>
                            @if($slider->image)
                                <img class="admin-thumb !w-20 !h-12 object-cover" src="{{ Storage::url($slider->image) }}" alt="">
                            @endif
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->hashtag }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.sliders.edit', $slider) }}" class="admin-btn admin-btn-outline !py-2 !px-3">Edit</a>
                                <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('Delete this slider?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn-danger !py-2 !px-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-10">No sliders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $sliders->links() }}</div>
    </div>
@endsection
