@extends('layouts.app')
@section('title', 'SARAS CREATIONS')
@section('content')
    <div class="container-fluid">
        <section class="mt-24 md:mt-10 pt-40 pb-28 md:pt-52 md:pb-36 no-repeat bg-center bg-cover" style="background-image: url('https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/page-title.jpg')">
            <div class="my-16 mx-auto px-6 lg:px-32">
                <h1 class="text-4xl md:text-7xl font-bold text-[#333333] mb-3 leading-none mt-10">Contact Us</h1>
                <div class="flex items-center gap-2 text-sm text-gray-600 mt-5">
                    <a href="{{ route('home') }}" class="text-[#ababab] font-bold text-lg hover:text-black transition-colors">Home</a>
                    <span class="text-gray-400">/</span>
                    <span class="border-b border-black text-black tracking-[10%] text-lg font-bold">Contact Us</span>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-14">

                <div class="text-center mb-20">
                    <h4 class="text-3xl font-black tracking-wide text-[#333333]">Contact detail</h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <div class="flex flex-col items-center text-center border-r border-gray-200 pb-8 md:pb-0">
                        <div class="w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fa fa-mobile text-5xl text-gray-300"></i>
                        </div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-[#333333] mb-3">PHONE</h4>
                        @if(filled($siteSettings->phone))
                            <a href="tel:{{ preg_replace('/\s+/', '', $siteSettings->phone) }}" class="text-sm text-gray-500 leading-relaxed tracking-widest hover:text-black transition-colors">{{ $siteSettings->phone }}</a>
                        @else
                            <p class="text-sm text-gray-400 leading-relaxed tracking-widest">Add phone in Admin → Site contact</p>
                        @endif
                    </div>

                    <div class="flex flex-col items-center text-center border-r border-gray-200 pb-8 md:pb-0">
                        <div class="w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fa fa-headphones text-5xl text-gray-300"></i>
                        </div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-[#333333] mb-3">ADDRESS</h4>
                        @if(filled($siteSettings->address))
                            <p class="text-sm text-gray-500 leading-relaxed tracking-widest">{!! nl2br(e($siteSettings->address)) !!}</p>
                        @else
                            <p class="text-sm text-gray-400 leading-relaxed tracking-widest">Add address in Admin → Site contact</p>
                        @endif
                    </div>

                    <div class="flex flex-col items-center text-center px-6">
                        <div class="w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fa fa-envelope text-5xl text-gray-300"></i>
                        </div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-[#333333] mb-3">EMAIL</h4>
                        @if(filled($siteSettings->email))
                            <a href="mailto:{{ $siteSettings->email }}" class="text-sm text-gray-500 leading-relaxed tracking-widest hover:text-black transition-colors break-all">{{ $siteSettings->email }}</a>
                        @else
                            <p class="text-sm text-gray-400 leading-relaxed tracking-widest">Add email in Admin → Site contact</p>
                        @endif
                    </div>

                </div>

                @include('partials.social-links', ['variant' => 'contact'])
            </div>
        </section>

        <section class="py-24 bg-[#F7F7F7]">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-14">
                <div class="max-w-2xl mx-auto">

                    <div class="text-center mb-6">
                        <h4 class="text-3xl font-black tracking-wide text-[#333333] mb-6">Get in touch with us</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">
                            Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur erit qui inea
                        </p>
                    </div>

                    <div id="contact-form-alert" class="hidden mb-6 p-4 text-sm border-l-4" role="alert"></div>

                    <form id="contact-form" action="{{ route('contactUs.store') }}" method="POST" class="mt-10" novalidate>
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <input type="text" name="name" placeholder="Name *"
                                    class="w-full bg-white px-5 py-4 text-sm text-[#333333] tracking-wide border border-transparent focus:border-[#333333] transition-colors"/>
                                <p class="text-red-500 text-xs mt-1 hidden" data-error-for="name"></p>
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Email *"
                                    class="w-full bg-white px-5 py-4 text-sm text-[#333333] tracking-wide border border-transparent focus:border-[#333333] transition-colors"/>
                                <p class="text-red-500 text-xs mt-1 hidden" data-error-for="email"></p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <input type="tel" name="phone" placeholder="Phone *"
                                class="w-full bg-white px-5 py-4 text-sm text-[#333333] tracking-wide border border-transparent focus:border-[#333333] transition-colors"/>
                            <p class="text-red-500 text-xs mt-1 hidden" data-error-for="phone"></p>
                        </div>
                        <div class="mb-6">
                            <textarea name="message" rows="8" placeholder="Message *"
                                class="w-full bg-white px-5 py-4 text-sm text-[#333333] tracking-wide border border-transparent focus:border-[#333333] transition-colors resize-none"></textarea>
                            <p class="text-red-500 text-xs mt-1 hidden" data-error-for="message"></p>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="contact-submit-btn" class="bg-black text-white text-xs font-bold uppercase tracking-widest px-12 py-4 hover:bg-[#333333] transition-colors disabled:opacity-60 disabled:cursor-not-allowed">
                                <span class="btn-text">SUBMIT</span>
                                <span class="btn-loading hidden">SENDING...</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/contact.js') }}?v={{ filemtime(public_path('js/contact.js')) }}"></script>
@endpush
