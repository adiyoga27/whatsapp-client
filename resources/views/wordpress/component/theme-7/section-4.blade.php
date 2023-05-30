<section class="text-arsenic w-full pt-16 pb-20 font-poppins-regular custom-section-4 theme-7
lg:pt-10 lg:pb-10">
    <div class="grid grid-cols-[411px_auto] max-w-[1107px] gap-x-20  mx-auto relative
    lg:grid-cols-1 lg:px-8">
        <div class="self-center
        ">
            <div class="text-base font-inter-semibold  mb-6 relative text-apple 
        lg:text-[13px] lg:mb-3">
                Dibuat Untuk Anda</div>
            <div class="text-[40px] font-inter-bold capitalize mb-6
        lg:text-[24px] lg:mb-4">Produk Varash</div>
            <div class="font-inter-regular text-sm text-spanish-gray
        lg:text-[13px]">Berikut daftar dari produk
                varash yang
                kami buat untuk
                Anda.</div>

        </div>
        <div class="pt-19 pb-14
    lg:pb-0">
            <div class="max-w-[600px] lg:max-w-full">
                <div class="swiper mySwiper overflow-hidden  static pb-14">
                    <div class="swiper-wrapper relative">
                        @for ($i = 0; $i < (count($product) > 10 ? 10 : count($product)); $i++)
                            <div
                                class="swiper-slide w-81.75 h-112 flex-col flex  text-arsenic relative flex flex-col justify-end cursor-pointer
                                lg:w-full">
                                <div class="bg-white border border-chinese-white h-100.5 flex flex-col justify-between">
                                    <div class="relative">
                                        <div
                                            class="w-75 h-62.25 absolute left-1/2 -translate-x-1/2 -top-12
                                        lg:w-60 lg:h-52">
                                            <img class="w-full h-full object-cover"
                                                src="{{ asset('storage/' . $product[$i]->image) }}" alt="product">
                                        </div>
                                    </div>
                                    <div class=" text-center text-[15px] px-9 pb-7">
                                        <div class="">{{ $product[$i]->name }}</div>
                                        <div
                                            class="text-gray-1 mt-4 mb-8 line-clamp-3
                                    lg:text-[13px] lg:mb-4">
                                            {{ strip_tags($product[$i]->description) }}
                                        </div>
                                        <div class="text-apple  lg:text-[13px]"><a href="/product">Lihat
                                                Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div
                        class="absolute left-0 top-[68%]  w-full max-w-max  lg:top-full flex lg:left-1/2 lg:-translate-x-1/2">
                        <div class="swiper-pagination  relative self-center px-14"></div>
                        <div class="swiper-button-prev">
                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10L1 5.5L6 1" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 10L6 5.5L1 1" stroke="#55B33F" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
    </div>
</section>
