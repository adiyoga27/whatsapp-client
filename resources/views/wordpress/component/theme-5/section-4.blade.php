<section
    class="text-arsenic w-full text-center pt-0 pb-20 font-poppins-regular custom-section-4
lg:px-3 lg:pt-10 lg:py-10">
    <div class="text-base font-inter-semibold  mb-6 relative text-apple
    lg:text-[13px] lg:mb-3 ">
        Dibuat Untuk Anda</div>
    <div class="text-[40px] font-inter-bold capitalize mb-6
    lg:text-[24] lg:mb-4">Produk Varash</div>
    <div class="font-inter-regular text-sm text-spanish-gray
    lg:text-[13px] lg:px-5">Berikut daftar dari produk
        varash yang
        kami buat untuk
        Anda.</div>
    <div class="pt-19 pb-6">
        <div class="swiper  overflow-hidden  relative pb-14">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < (count($product) > 10 ? 10 : count($product)); $i++)
                    <div
                        class="swiper-slide w-81.75 h-112 flex-col flex  text-arsenic relative flex flex-col justify-end cursor-pointer">
                        <div class="bg-white border border-chinese-white h-100.5 flex flex-col justify-between">
                            <div class="relative">
                                <div class="w-75 h-62.25 absolute left-1/2 -translate-x-1/2 -top-12">
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
                                <div class="text-apple   lg:text-[13px]">
                                    <a href="/product/{{ $product[$i]->slug }}">lihat Selengkapnya</a>
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
                class="font-poppins-semibold text-sm text-white  h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple
            lg:block lg:mx-auto lg:text-[13px] lg:h-10">
                Lihat Semua</button>
        </a>
    </div>
</section>
