<header class="absolute top-0 h-26 flex   w-full font-inter-regular bg-transparant">
    <nav class="flex justify-between w-full max-w-[1107px] mx-auto self-center
    lg:flex-row-reverse lg:px-10">
        <div class="self-center ">
            <a href="/" class="">
                <img class="w-[70px] h-[70px]   object-contain
                lg:w-[60px] lg:h-[60px]"
                    src="{{ asset('/wordpress/img/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="self-center">
            <button class="w-8.25 h-8.25 bg-apple rounded-[5px]  justify-center items-center hidden
            lg:flex"
                id="icon-menu">
                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.65845 1.65869H15.3917" stroke="white" stroke-width="3" stroke-linecap="round" />
                    <path d="M2 12H15" stroke="white" stroke-width="3" stroke-linecap="round" />
                    <path d="M2 7H13.1174" stroke="white" stroke-width="3" stroke-linecap="round" />
                </svg>
            </button>
            <div
                class="sidebar animated faster sider-swipe fadeOut
            lg:fixed lg:top-0 lg:left-0 lg:w-full lg:h-min-screen lg:hidden">
                <div
                    class="flex gap-x-9 self-center  relative  animated sider-content
                lg:bg-white lg:min-h-screen lg:self-start lg:flex-col lg:w-[274px] lg:shadow-custom-4 lg:rounded-tr-[50px] ">
                    <div class="lg:p-4 hidden lg:block">
                        <div class=" lg:w-12 h:h-12 ">
                            <img class="w-full h-full object-contain" src="{{ asset('/wordpress/img/logo.png') }}"
                                alt="logo">
                        </div>
                    </div>
                    <div class="w-7 h-7 hidden lg:block lg:bg-apple lg:rounded-full lg:flex lg:justify-center lg:items-center absolute -right-4 top-16"
                        id="icon-hidden">
                        <svg class="absolute left-1/2 -translate-x-1/2" width="10" height="17"
                            viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.91667 2.45833L1.875 8.49999L7.91667 14.5417" stroke="white" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <ul
                        class="flex uppercase font-inter-semibold text-black-1 text-xs self-center text-raisin-black
                    lg:flex-col lg:self-start lg:w-full lg:text-[17px] lg:uppercase lg:mb-3 lg:mt-6">
                        <a href="/"
                            class="my-4 px-3.5 relative  cursor-pointer  after:content-['']  {{ Request::is('/')
                                ? 'after:absolute after:-bottom-4 after:left-1/2 after:-translate-x-1/2 after:bg-apple after:h-2.5 after:w-2.5 after:rounded-full
                                                                                                                                                                                                                                                                                                                    lg:after:left-0 lg:after:top-0 lg:after:h-full lg:my-0 lg:py-4 lg:px-10'
                                : '' }}
                        hover:after:content-[''] hover:after:absolute hover:after:-bottom-4 hover:after:left-1/2 hover:after:-translate-x-1/2 hover:after:bg-apple hover:after:h-2.5 hover:after:w-2.5 hover:after:rounded-full
                        lg:hover:after:left-0 lg:hover:after:top-0 lg:hover:after:h-full lg:my-0 lg:py-4 lg:px-10 ">
                            home
                        </a>
                        <a href="/product"
                            class="my-4 px-3.5 relative cursor-pointer after:content-[''] {{ Request::is('product/*') || Request::is('product')
                                ? 'after:absolute after:-bottom-4 after:left-1/2 after:-translate-x-1/2 after:bg-apple after:h-2.5 after:w-2.5 after:rounded-full
                                                                                                                                                                                                                                                                                                                    lg:after:left-0 lg:after:top-0 lg:after:h-full lg:my-0 lg:py-4 lg:px-10'
                                : '' }}
                            hover:after:content-[''] hover:after:absolute hover:after:-bottom-4 hover:after:left-1/2 hover:after:-translate-x-1/2 hover:after:bg-apple hover:after:h-2.5 hover:after:w-2.5 hover:after:rounded-full
                            lg:hover:after:left-0 lg:hover:after:top-0 lg:hover:after:h-full lg:my-0 lg:py-4 lg:px-10">
                            product
                        </a>
                        <a href="/article"
                            class="my-4 px-3.5 relative cursor-pointer after:content-[''] {{ Request::is('article/*') || Request::is('article')
                                ? 'after:absolute after:-bottom-4 after:left-1/2 after:-translate-x-1/2 after:bg-apple after:h-2.5 after:w-2.5 after:rounded-full
                                                                                                                                                                                                                                                                                                                    lg:after:left-0 lg:after:top-0 lg:after:h-full lg:my-0 lg:py-4 lg:px-10'
                                : '' }}
                            hover:after:content-[''] hover:after:absolute hover:after:-bottom-4 hover:after:left-1/2 hover:after:-translate-x-1/2 hover:after:bg-apple hover:after:h-2.5 hover:after:w-2.5 hover:after:rounded-full
                            lg:hover:after:left-0 lg:hover:after:top-0 lg:hover:after:h-full lg:my-0 lg:py-4 lg:px-10">
                            artikel
                        </a>
                        <a href="/testimonial"
                            class="my-4 px-3.5 relative cursor-pointer after:content-[''] {{ Request::is('testimonial')
                                ? 'after:absolute after:-bottom-4 after:left-1/2 after:-translate-x-1/2 after:bg-apple after:h-2.5 after:w-2.5 after:rounded-full
                                                                                                                                                                                                                                                                                                                    lg:after:left-0 lg:after:top-0 lg:after:h-full lg:my-0 lg:py-4 lg:px-10'
                                : '' }}
                            hover:after:content-[''] hover:after:absolute hover:after:-bottom-4 hover:after:left-1/2 hover:after:-translate-x-1/2 hover:after:bg-apple hover:after:h-2.5 hover:after:w-2.5 hover:after:rounded-full
                            lg:hover:after:left-0 lg:hover:after:top-0 lg:hover:after:h-full lg:my-0 lg:py-4 lg:px-10 ">
                            testimoni
                        </a>
                        {{-- <li
                            class="my-4 px-3.5 relative cursor-pointer
                            hover:after:content-[''] hover:after:absolute hover:after:-bottom-4 hover:after:left-1/2 hover:after:-translate-x-1/2 hover:after:bg-apple hover:after:h-2.5 hover:after:w-2.5 hover:after:rounded-full
                            lg:hover:after:left-0 lg:hover:after:top-0 lg:hover:after:h-full lg:my-0 lg:py-4 lg:px-10  ">
                            <a href="#tentang">tentang</a>
                        </li> --}}
                    </ul>
                    <div class="self-center
                    lg:self-start lg:px-3.5">
                        <a href="/contact">
                            <button
                                class="text-xs text-white bg-apple uppercase px-4 py-3 border border-apple rounded-md self-center 
                            lg:text-[13px] lg:h-10">kontak
                                kami</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
