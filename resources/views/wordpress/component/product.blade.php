<section class="text-arsenic w-full text-center pt-38.5 pb-20 font-poppins-regular
lg:pt-28">
    <div class="text-[40px] font-inter-bold capitalize mb-10 text-black
    lg:text-left lg:text-[24px] lg:px-10">Produk
        Varash
    </div>
    <div class=" relative pb-14 ">
        <div
            class="grid justify-items-center lg:grid-cols-1 grid-cols-3 gap-10 w-full max-w-[1107px] mx-auto relative testing">
            @for ($i = 0; $i < count($product); $i++)
                <div class="w-81.75 h-112 flex-col flex text-arsenic relative justify-end" data-swiper-slide-index="0"
                    role="group" aria-label="1 / 1">
                    <div class="bg-white border border-chinese-white h-100.5 flex flex-col justify-between">
                        <div class="relative">
                            <div class="w-75 h-62.25 absolute left-1/2 -translate-x-1/2 -top-12">
                                <img class="w-full h-full object-cover"
                                    src="{{ asset('storage/' . $product[$i]->image) }}" alt="product">
                            </div>
                        </div>

                        <div class=" text-center text-[15px] px-9 pb-7">
                            <div class="">{{ $product[$i]->name }}</div>
                            <div class="text-gray-1 mt-4 mb-8 line-clamp-3">
                                {{ strip_tags($product[$i]->description) }}
                            </div>
                            <div class="text-apple cursor-pointer">
                                <a href="/product/{{ $product[$i]->slug }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div
            class="swiper-pagination absolute bottom-0 swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                aria-label="Go to slide 1" aria-current="true"></span>
        </div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
    <div>
        <div class="flex items-center justify-center w-full py-10   lg:justify-between ">
            {{ $product->links('admin.pagination') }}
        </div>
    </div>
</section>
