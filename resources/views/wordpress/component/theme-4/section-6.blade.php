<section id="article" class="py-38.5 text-center w-full  mx-auto relative
lg:py-12">
    <div class="lg:px-8">
        <div class="uppercase text-xs mb-9.5 text-center font-poppins-semibold text-apple
    lg:text-[13px] lg:mb-4">
            artikel
            pilihan
        </div>
        <div class="uppercase text-[40px] mb-4.25 text-center font-inter-bold text-apple
    lg:text-[24px] lg:mb-0">
            ARTIKEL
            PILIHAN
            KAMI</div>
    </div>
    <div>
        <div class="pt-19.8 pb-14
        lg:pb-8">
            <div class="swiper-1 mySwiper relative pb-14 pt-19">
                <div class="swiper-wrapper">
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
                                    {{ $article[$i]->title }}
                                </div>
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
    lg:text-[13px] lg:h-10">Lihat
            Semua</button>
    </a>
</section>
