@extends('admin.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Contact Messages')

@section('content')
    @include('admin.partials.page-header', [
        'eyebrow' => 'Inquiries',
        'title' => 'Contact Messages',
    ])

    <div class="admin-card p-5 mb-6">
        <form method="GET" action="{{ route('admin.contact-messages.index') }}" class="flex flex-col sm:flex-row gap-3">
            <input class="admin-input flex-1" type="search" name="search" value="{{ $search }}" placeholder="Search by name, email, or phone...">
            <button type="submit" class="admin-btn admin-btn-outline">Search</button>
        </form>
    </div>

    <div class="admin-card overflow-x-auto">
        <table class="admin-table w-full min-w-[700px]">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td><a href="mailto:{{ $message->email }}" class="text-rouge hover:underline">{{ $message->email }}</a></td>
                        <td><a href="tel:{{ $message->phone }}" class="hover:underline">{{ $message->phone }}</a></td>
                        <td class="max-w-[200px] truncate">{{ Str::limit($message->message, 60) }}</td>
                        <td class="text-sm text-gray-500 whitespace-nowrap">{{ $message->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.contact-messages.show', $message) }}" class="admin-btn admin-btn-outline !py-2 !px-3">View</a>
                                <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn-danger !py-2 !px-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-10">No contact messages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 admin-pagination">{{ $messages->links() }}</div>
    </div>
@endsection
