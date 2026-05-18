@extends('admin.layout')

@section('title', 'View Message')

@section('content')
    @include('admin.partials.page-header', [
        'eyebrow' => 'Inquiries',
        'title' => 'Message from '.$message->name,
    ])

    <div class="admin-card p-6 lg:p-8 max-w-3xl">
        <dl class="space-y-5">
            <div>
                <dt class="admin-label">Name</dt>
                <dd class="text-charcoal">{{ $message->name }}</dd>
            </div>
            <div>
                <dt class="admin-label">Email</dt>
                <dd><a href="mailto:{{ $message->email }}" class="text-rouge hover:underline">{{ $message->email }}</a></dd>
            </div>
            <div>
                <dt class="admin-label">Phone</dt>
                <dd><a href="tel:{{ $message->phone }}" class="text-charcoal hover:underline">{{ $message->phone }}</a></dd>
            </div>
            <div>
                <dt class="admin-label">Submitted</dt>
                <dd class="text-gray-600">{{ $message->created_at->format('F j, Y \a\t g:i A') }}</dd>
            </div>
            <div>
                <dt class="admin-label">Message</dt>
                <dd class="text-charcoal leading-relaxed whitespace-pre-wrap bg-cream p-4 border border-charcoal/10">{{ $message->message }}</dd>
            </div>
        </dl>

        <div class="mt-8 flex gap-3">
            <a href="{{ route('admin.contact-messages.index') }}" class="admin-btn admin-btn-outline">Back to list</a>
            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-btn admin-btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
