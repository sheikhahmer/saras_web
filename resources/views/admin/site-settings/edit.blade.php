@extends('admin.layout')

@section('title', 'Site contact & social')

@section('content')
    @include('admin.partials.page-header', ['eyebrow' => 'CMS', 'title' => 'Contact & social links'])

    <form method="POST" action="{{ route('admin.site-settings.update') }}" class="admin-card p-6 lg:p-8 max-w-3xl space-y-8">
        @csrf
        @method('PUT')

        <div>
            <p class="text-[0.55rem] font-bold tracking-[0.25em] uppercase text-rouge mb-4">Business details</p>
            <div class="space-y-5">
                <div>
                    <label class="admin-label" for="address">Address</label>
                    <textarea class="admin-input min-h-[100px]" name="address" id="address" rows="4" placeholder="Street, city, postal code">{{ old('address', $siteSetting->address) }}</textarea>
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="admin-label" for="phone">Phone (display)</label>
                        <input class="admin-input" type="text" name="phone" id="phone" value="{{ old('phone', $siteSetting->phone) }}" placeholder="+92 316 644 8508">
                    </div>
                    <div>
                        <label class="admin-label" for="whatsapp_number">WhatsApp number</label>
                        <input class="admin-input" type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $siteSetting->whatsapp_number) }}" placeholder="Leave blank to use phone digits">
                        <p class="text-[0.65rem] text-charcoal/50 mt-1">Used for the header WhatsApp button. Country code included (e.g. 923166448508).</p>
                    </div>
                </div>
                <div>
                    <label class="admin-label" for="email">Email</label>
                    <input class="admin-input" type="email" name="email" id="email" value="{{ old('email', $siteSetting->email) }}" placeholder="hello@example.com">
                </div>
            </div>
        </div>

        <div>
            <p class="text-[0.55rem] font-bold tracking-[0.25em] uppercase text-rouge mb-4">Social profiles</p>
            <p class="text-[0.7rem] text-charcoal/55 mb-4">Full URLs including https://. Leave blank to hide an icon on the site.</p>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="admin-label" for="facebook_url">Facebook</label>
                    <input class="admin-input" type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $siteSetting->facebook_url) }}" placeholder="https://facebook.com/...">
                </div>
                <div>
                    <label class="admin-label" for="instagram_url">Instagram</label>
                    <input class="admin-input" type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $siteSetting->instagram_url) }}" placeholder="https://instagram.com/...">
                </div>
                <div>
                    <label class="admin-label" for="pinterest_url">Pinterest</label>
                    <input class="admin-input" type="url" name="pinterest_url" id="pinterest_url" value="{{ old('pinterest_url', $siteSetting->pinterest_url) }}" placeholder="https://pinterest.com/...">
                </div>
                <div>
                    <label class="admin-label" for="twitter_url">X (Twitter)</label>
                    <input class="admin-input" type="url" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $siteSetting->twitter_url) }}" placeholder="https://x.com/...">
                </div>
                <div>
                    <label class="admin-label" for="youtube_url">YouTube</label>
                    <input class="admin-input" type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $siteSetting->youtube_url) }}" placeholder="https://youtube.com/...">
                </div>
                <div>
                    <label class="admin-label" for="snapchat_url">Snapchat</label>
                    <input class="admin-input" type="url" name="snapchat_url" id="snapchat_url" value="{{ old('snapchat_url', $siteSetting->snapchat_url) }}" placeholder="https://snapchat.com/add/...">
                </div>
                <div class="sm:col-span-2">
                    <label class="admin-label" for="tiktok_url">TikTok</label>
                    <input class="admin-input" type="url" name="tiktok_url" id="tiktok_url" value="{{ old('tiktok_url', $siteSetting->tiktok_url) }}" placeholder="https://tiktok.com/@...">
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="admin-btn admin-btn-primary">Save settings</button>
        </div>
    </form>
@endsection
