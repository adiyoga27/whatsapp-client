<section class="bg-cultured text-arsenic w-full text-center pt-19.5 font-inter-regular
lg:bg-white">
    <div class="lg:px-8">
        <div
            class="text-xs uppercase mb-6 pb-2 relative
    after:content-[''] after:absolute after:w-6 after:h-0.5 after:bg-apple after:bottom-0 after:left-1/2 after:-translate-x-1/2
    lg:mb-4">
            DIBUAT UNTUK ANDA</div>
        <div class="text-[29px] uppercase mb-4">PRODUK VARASH</div>
        <div class="text-sm text-gray-3">Berikut daftar dari produk varash yang kami buat untuk Anda.</div>
    </div>
    <div class="pt-19 pb-14
    lg:pb-5 lg:pt-0">
        <div class="swiper mySwiper overflow-hidden  relative pb-14">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < (count($product) > 10 ? 10 : count($product)); $i++)
                    <div
                        class="swiper-slide w-81.75 h-112 flex-col flex  text-arsenic relative flex flex-col justify-end cursor-pointer">
                        <div
                            class="bg-white border border-chinese-white h-100.5 flex flex-col justify-between
                        lg:h-[322px]">
                            <div class="relative">
                                <div
                                    class="w-75 h-62.25 absolute left-1/2 -translate-x-1/2 -top-12
                                lg:w-[259px] lg:h-[202px]">
                                    <img class="w-full h-full object-cover"
                                        src="{{ asset('storage/' . $product[$i]->image) }}" alt="product">
                                </div>
                            </div>
                            <div class=" text-center text-[15px] px-9 pb-7">
                                <div class="">{{ $product[$i]->name }}</div>
                                <div
                                    class="text-gray-1 mt-4 mb-8
                                lg:text-[13px] lg:mb-4">
                                    {{ Str::limit(strip_tags($product[$i]->description), 50, '...') }}
                                </div>
                                <div class="text-apple"><a href="/product/{{ $product[$i]->slug }}">Lihat
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="swiper-pagination absolute bottom-0"></div>
        </div>
    </div>
    <div>
        <a href="/product">
            <button
                class="font-inter-bold text-sm h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple text-white
            lg:h-10 lg:text-[13px]">Lihat
                Semua</button>
        </a>
    </div>
    <div class="relative">
        <svg width="100%" class="absolute top-0 lg:hidden" viewBox="0 0 1441 79" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H1441V4C876.824 100.771 561.011 105.307 0 4V0Z" fill="#F7F7F7" />
        </svg>
    </div>
</section>
