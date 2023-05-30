<section
    class="py-38.5 text-center w-full  mx-auto font-inter-regular relative overflow-hidden
before:content-[''] before:absolute before:w-full before:max-w-[1100px] before:h-px before:bg-chinese-white before:top-0 before:left-1/2 before:-translate-x-1/2
after:content-[''] after:absolute after:w-full after:max-w-[1100px] after:h-px after:bg-chinese-white after:bottom-0 after:left-1/2 after:-translate-x-1/2
lg:before:hidden lg:after:hidden lg:py-10 ">
    <div
        class="uppercase max-w-max mx-auto text-[13px] mb-9.5 pb-2 text-center  relative after:content-[''] after:absolute after:w-6 after:h-0.5 after:bg-apple after:bottom-0 after:left-1/2 after:-translate-x-1/2
        lg:mb-5">
        artikel pilihan
    </div>
    <div class="uppercase text-[21px] mb-4.25 text-center">ARTIKEL PILIHAN KAMI</div>
    <div>
        <div class="pt-19.8 pb-14
        lg:py-5">
            <div class="swiper-1  mySwiper relative pb-14 pt-19">
                <div class="swiper-wrapper ">
                    @for ($i = 0; $i < (count($article) > 10 ? 10 : count($article)); $i++)
                        <a href="/article/{{ $article[$i]->slug }}"
                            class="swiper-slide w-86.25  h-134.75 flex flex-col justify-end  text-white text-left bg-cover bg-no-repeat
                        lg:w-[280px] lg:h-[437.45px]"
                            style="background-image:
                            url('{{ asset('storage/' . $article[$i]->image) }}')">
                            <div class="bg-dark-1  pb-3.5 pt-24 px-8 ">
                                <div
                                    class="mb-1.5 font-semiBold text-[21px]
                                lg:text-[15px]">
                                    {{ $article[$i]->title }}</div>
                                <div class="text-base
                                lg:text-[13px]">
                                    {{ $article[$i]->created_at }}</div>
                            </div>
                        </a>
                    @endfor

                </div>
                <div class="swiper-pagination-1 absolute bottom-0"></div>
            </div>
        </div>
    </div>
    <a href="/article">
        <button
            class="font-inter-bold text-sm h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple text-white
        lg:h-10 lg:text-[13px]">Lihat
            Semua</button>
    </a>
</section>
