@extends('layouts.app')
@section('title', 'SARAS CREATIONS')
@section('content')
  <div class="container-fluid">
    <section class="relative bg-[#F4F3F1] min-h-[550px] flex items-center overflow-hidden py-12 lg:py-0">

        <div class="absolute right-0 top-0 h-full w-full hidden lg:flex items-center justify-end overflow-hidden">

            <img src="pics\contactusimg-removebg-preview.png">

        </div>

        <div class="container mx-auto px-6 md:px-12 lg:px-24 relative z-10">
            <div class="flex flex-col lg:flex-row items-center">

                <div class="w-full lg:w-1/2 text-left">
                    <h1 class="text-5xl md:text-7xl font-bold text-[#333333] tracking-tighter leading-none">
                        About Us
                    </h1>

                    <nav
                        class="mt-8 flex items-center space-x-3 text-[10px] md:text-xs tracking-[0.2em] uppercase font-bold text-[#ABABAB]">
                        <a href="index.html" class="hover:text-[#ff6666] transition-colors">Home</a>
                        <span class="text-gray-300">/</span>
                        <a href="#" class="text-black border-b-2 border-black pb-1">About Us</a>
                    </nav>
                </div>

                <div class="w-full mt-16 lg:hidden flex justify-center">
                    <img src="pics/about-us-removebg-preview.png" alt="Decor Plant"
                         class="w-[80%] h-auto drop-shadow-xl">
                </div>

            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            <div class="max-w-xl space-y-10">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#333333]">
                    A Better Way To Shop Online For Furniture
                </h2>
            </div>

            <div class="space-y-8">
                <p class="text-[#777777] max-w-lg">
                    Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                    consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur erit qui in ea voluptate
                    velit qui in ea voluptate vele
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">

                    <div>
                        <h4 class="text-xl font-bold text-[#333333] mb-2">Free Shipping</h4>
                        <p class="text-xs tracking-[0.2em] uppercase text-[#999999] font-semibold">All order over $59
                        </p>
                    </div>

                    <div>
                        <h4 class="text-xl font-bold text-[#333333] mb-2">Support Customer</h4>
                        <p class="text-xs tracking-[0.2em] uppercase text-[#999999] font-semibold">Support 24/7</p>
                    </div>

                    <div>
                        <h4 class="text-xl font-bold text-[#333333] mb-2">Secure Payments</h4>
                        <p class="text-xs tracking-[0.2em] uppercase text-[#999999] font-semibold">Support 24/7</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10 md:py-20">

        <div class="mb-8 overflow-hidden group relative cursor-pointer rounded-sm">
            <img src="https://images.pexels.com/photos/4792064/pexels-photo-4792064.jpeg?_gl=1*1ouhf1a*_ga*MTU0NzExNTc3NS4xNzcyNTI1MjI2*_ga_8JE65Q40S6*czE3NzI1MjUyMjYkbzEkZzEkdDE3NzI1MjUyNTkkajI3JGwwJGgw" alt="" class="w-full h-[300px] md:h-[500px] lg:h-[600px] object-cover transition-transform duration-700 group-hover:scale-105">

            <div class="absolute inset-0 top-0 -left-[100%] w-1/2 h-full bg-gradient-to-r from-transparent via-white/40 to-transparent -skew-x-12 transition-all duration-700 group-hover:left-[125%]">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="overflow-hidden group relative cursor-pointer">
                <img src="https://images.pexels.com/photos/16674475/pexels-photo-16674475.jpeg?_gl=1*alqskb*_ga*MTU0NzExNTc3NS4xNzcyNTI1MjI2*_ga_8JE65Q40S6*czE3NzI1MjUyMjYkbzEkZzEkdDE3NzI1MjU1MzckajM0JGwwJGgw" alt="Lamp and Plant"
                     class="w-full aspect-video object-cover transition-transform duration-700 group-hover:scale-110">

                <div
                    class="absolute inset-0 top-0 -left-[100%] w-1/4 h-full bg-gradient-to-r from-transparent via-white/60 to-transparent -skew-x-12 transition-all duration-700 group-hover:left-[125%]">
                </div>
            </div>

            <div class="overflow-hidden group relative cursor-pointer">
                <img src="https://images.pexels.com/photos/7297165/pexels-photo-7297165.jpeg?_gl=1*rvvjne*_ga*MTU0NzExNTc3NS4xNzcyNTI1MjI2*_ga_8JE65Q40S6*czE3NzI1MjUyMjYkbzEkZzEkdDE3NzI1MjUyNTkkajI3JGwwJGgw" alt="Chair and Table"
                     class="w-full aspect-video object-cover transition-transform duration-700 group-hover:scale-110">

                <div
                    class="absolute inset-0 top-0 -left-[100%] w-1/4 h-full bg-gradient-to-r from-transparent via-white/60 to-transparent -skew-x-12 transition-all duration-700 group-hover:left-[125%]">
                </div>
            </div>

        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            <div class="max-w-xl space-y-10">
                <h2 class="text-4xl md:text-[40px] font-bold text-[#333333]">
                    The best team available
                </h2>
            </div>

            <div class="space-y-8">
                <p class="text-[#696969] max-w-lg leading-relaxed">
                    Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                    consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur erit qui in ea voluptate
                    verit qui in ea voluptate vele
                </p>
                <div>
                    <a href="#" class="text-[#333333] hover:text-[#ff6666] transition-colors font-bold underline mt-4">
                        View all.
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="py-16 bg-white rounded-md shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 text-center px-10">

            <div class="group">
                <div class="relative overflow-hidden rounded-full w-64 h-64 mx-auto mb-6 border-4 border-gray-100">
                    <img src="pics/member1.jpg" alt="John Anderson"
                         class="w-full h-full object-cover group-hover:scale-105 duration-500">
                    <div
                        class="absolute inset-0 top-0 -left-[100%] w-1/4 h-full bg-gradient-to-r from-transparent via-white/60 to-transparent -skew-x-12 transition-all duration-700 group-hover:left-[125%]">
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900">John Anderson
                </h3>
                <p class="text-xs tracking-widest uppercase text-gray-400 font-semibold mt-1">Designer</p>
                <div
                    class="mt-4 flex items-center justify-center space-x-6 text-sm text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="#" class="hover:text-blue-800 transition-colors flex items-center font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Facebook</span>
                    </a>
                    <a href="#" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Twitter</span>
                    </a>
                    <a href="#" class="hover:text-red-600 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Google</span>
                    </a>
                </div>

            </div>

            <div class="group">
                <div class="relative overflow-hidden rounded-full w-64 h-64 mx-auto mb-6 border-4 border-gray-100">
                    <img src="pics/member2.jpg" alt="Fabian Hellgardt"
                         class="w-full h-full object-cover group-hover:scale-105 duration-500">
                    <div
                        class="absolute inset-0 top-0 -left-[100%] w-1/4 h-full bg-gradient-to-r from-transparent via-white/60 to-transparent -skew-x-12 transition-all duration-700 group-hover:left-[125%]">
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Fabian Hellgardt
                </h3>
                <p class="text-xs tracking-widest uppercase text-gray-400 font-bold mt-1">Photography</p>

                <div
                    class="mt-4 flex items-center justify-center space-x-6 text-sm text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="#" class="hover:text-blue-800 transition-colors flex items-center font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Facebook</span>
                    </a>
                    <a href="#" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Twitter</span>
                    </a>
                    <a href="#" class="hover:text-red-600 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Google</span>
                    </a>
                </div>
            </div>

            <div class="group">
                <div class="relative overflow-hidden rounded-full w-64 h-64 mx-auto mb-6 border-4 border-gray-100">
                    <img src="pics/member3.jpg" alt="Maria Kiehlmeier"
                         class="w-full h-full object-cover group-hover:scale-105 duration-500">
                    <div
                        class="absolute inset-0 top-0 -left-[100%] w-1/4 h-full bg-gradient-to-r from-transparent via-white/60 to-transparent -skew-x-12 transition-all duration-700 group-hover:left-[125%]">
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Maria Kiehlmeier
                </h3>
                <p class="text-xs tracking-widest uppercase text-gray-400 font-bold mt-1">Seller</p>
                <div
                    class="mt-4 flex items-center justify-center space-x-6 text-sm text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="#" class="hover:text-blue-800 transition-colors flex items-center font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Facebook</span>
                    </a>
                    <a href="#" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Twitter</span>
                    </a>
                    <a href="#" class="hover:text-red-600 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Google</span>
                    </a>
                </div>
            </div>

            <div class="group">
                <div class="relative overflow-hidden rounded-full w-64 h-64 mx-auto mb-6 border-4 border-gray-100">
                    <img src="pics/member4.jpg" alt="Viviane Grigull"
                         class="w-full h-full object-cover group-hover:scale-105 duration-500">
                    <div
                        class="absolute inset-0 top-0 -left-[100%] w-1/4 h-full bg-gradient-to-r from-transparent via-white/60 to-transparent -skew-x-12 transition-all duration-700 group-hover:left-[125%]">
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Viviane Grigull
                </h3>
                <p class="text-xs tracking-widest uppercase text-gray-400 font-bold mt-1">Director</p>
                <div
                    class="mt-4 flex items-center justify-center space-x-6 text-sm text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="#" class="hover:text-blue-800 transition-colors flex items-center font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Facebook</span>
                    </a>
                    <a href="#" class="hover:text-blue-400 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Twitter</span>
                    </a>
                    <a href="#" class="hover:text-red-600 transition-colors flex items-center space-x-1.5 font-medium">
                        <svg class="w-4 h-4 text-gray-400 dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span>Google</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-[#f9f9f9] py-24 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-[#333333] mb-12">
                Do you have any question?
            </h2>

            <form action="#" class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <input type="text" name="name" placeholder="Name"
                           class="w-full px-6 py-2 bg-white border border-transparent focus:border-gray-200 focus:outline-none text-sm transition-all shadow-sm placeholder-gray-400">
                </div>

                <div>
                    <input type="email" name="email" placeholder="Email"
                           class="w-full px-6 py-2 bg-white border border-transparent focus:border-gray-200 focus:outline-none text-sm transition-all shadow-sm placeholder-gray-400">
                </div>

                <div class="md:col-span-2">
                    <textarea name="message" placeholder="Message" rows="6"
                              class="w-full px-6 py-2 bg-white border border-transparent focus:border-gray-200 focus:outline-none text-sm transition-all shadow-sm resize-none placeholder-gray-400"></textarea>
                </div>

                <div class="md:col-span-2 mt-4">
                    <button
                        class="mt-4 lg:mt-10 inline-block px-4 md:px-6 py-2 md:py-4 bg-[#333333] text-white text-xs md:text-sm tracking-widest uppercase border border-transparent transition-all duration-300 hover:bg-[#F7F7F7] hover:text-black hover:border-black">
                        Shop Now
                    </button>
                </div>

            </form>
        </div>
    </section>
  </div>
@endsection
