@extends('layouts.app')
@section('title', 'SARAS CREATIONS')
@section('content')
    <div class="container-fluid">
        <section class="mt-24 md:mt-10 pt-40 pb-28 md:pt-52 md:pb-36 no-repeat bg-center bg-cover" style="background-image: url('https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/page-title.jpg')">
            <div class="my-16 mx-auto px-6 lg:px-32">
                <h1 class="text-4xl md:text-7xl font-bold text-[#333333] mb-3 leading-none mt-10">Contact Us</h1>
                <div class="flex items-center gap-2 text-sm text-gray-600 mt-5">
                    <a href="#" class="text-[#ababab] font-bold text-lg hover:text-black transition-colors">Home</a>
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
                        <p class="text-sm text-gray-500 leading-relaxed tracking-widest">PHONE 01: +84 01122000</p>
                    </div>

                    <div class="flex flex-col items-center text-center border-r border-gray-200 pb-8 md:pb-0">
                        <div class="w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fa fa-headphones text-5xl text-gray-300"></i>
                        </div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-[#333333] mb-3">ADDRESS</h4>
                        <p class="text-sm text-gray-500 leading-relaxed tracking-widest">1800 Abbot Kinney Blvd.<br />Unit D, Venice</p>
                    </div>

                    <div class="flex flex-col items-center text-center px-6">
                        <div class="w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fa fa-lock text-5xl text-gray-300"></i>
                        </div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-[#333333] mb-3">EMAIL</h4>
                        <p class="text-sm text-gray-500 leading-relaxed tracking-widest">apprilstore@gmail.com
                            support@april.com</p>
                    </div>

                </div>
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

                    <form action="#" method="post" class="mt-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="text" name="your-name" placeholder="Name" required class="w-full bg-white px-5 py-4 text-sm text-[#333333] tracking-wide focus:border-[#333333] transition-colors"/>
                            <input type="email" name="your-email" placeholder="Email" required class="w-full bg-white px-5 py-4 text-sm text-[#333333] tracking-wide focus:border-[#333333] transition-colors"
                            />
                        </div>
                        <textarea name="your-message" rows="8" placeholder="Message" required class="w-full bg-white px-5 py-4 text-sm text-[#333333] tracking-wide focus:border-[#333333] transition-colors mb-6 resize-none"></textarea>
                        <div class="text-center">
                            <button type="submit" class="bg-black text-white text-xs font-bold uppercase tracking-widest px-12 py-4 hover:bg-[#333333] transition-colors">
                                SUBMIT
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection
