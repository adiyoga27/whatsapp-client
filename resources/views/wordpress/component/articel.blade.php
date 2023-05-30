<section class="text-arsenic lg:px-[10px] w-full text-center pt-38.5  pb-20 font-poppins-regular
lg:pt-28">
    <div class="w-full max-w-[1107px] mx-auto  relative testing">
        <div class="text-[40px] font-poppins-bold capitalize mb-6
        lg:text-left lg:text-[24px]">Artikel Kami</div>
        <div class="flex justify-between">
            <div class="text-[24px] font-poppins-semibold capitalize mb-6
            lg:text-[12px]">Artikel Pilihan
                Kami</div>
            <div class="text-[24px] text-gray-7 font-poppins-regular capitalize mb-6
            lg:text-[12px]">
                {{ date('D d F Y', strtotime(date('y-m-d'))) }}
            </div>
        </div>
        <div class="swiper overflow-hidden  relative pb-14">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < count($article); $i++)
                    <a href="/article/{{ $article[$i]->slug }}"
                        class="swiper-slide relative h-[555px]
        lg:h-[179px]">
                        <div class="">
                            <img class="z-0 absolute w-full h-full object-cover rounded-[5px]"
                                src="{{ asset('storage/' . $article[$i]->image) }}" alt="img-articel">
                        </div>
                        <div class="absolute w-full h-full bg-black opacity-50 object-cover rounded-[5px]"></div>
                        <div class="absolute bottom-5 text-left left-4">
                            <h1
                                class="z-1 text-[36px] font-inter-semibold capitalize mb-2 text-white
                lg:text-[14px]">
                                {{ $article[$i]->title }}
                            </h1>
                            <p
                                class="z-1 text-[24px] text-white font-inter-regular capitalize
                lg:text-[12px]">
                                {{ date('Y/m/d', strtotime($article[$i]->created_at)) }}</p>
                        </div>
                    </a>
                @endfor
            </div>
            <div class="swiper-pagination absolute bottom-0"></div>
        </div>
    </div>
    <div class="w-full max-w-[1107px] mx-auto py-10 relative testing
    lg:pt-5">
        <div class="text-[32px] font-poppins-semibold text-left capitalize mb-[36px]
        lg:text-[12px]">Artikel
            Terkini</div>
        <div class="grid grid-cols-2 md:grid-cols-1 gap-x-[50px] ">
            @for ($i = 0; $i < count($article); $i++)
                <a href="/article/{{ $article[$i]->slug }}"
                    class="relative grid grid-cols-[auto_237px] gap-4 justify-between md:border-b-[1px] py-10
                lg:py-5 lg:grid-cols-[auto_85px]">
                    <div>
                        <h3
                            class="text-[24px] font-poppins-semibold text-left capitalize mb-2
                        lg:text-[12px]">
                            {{ $article[$i]->title }}
                        </h3>
                        <p
                            class="text-[14px] font-poppins-regular text-left capitalize mb-2 text-spanish-gray
                        lg:text-[11px]">
                            Diposting {{ date('d F Y', strtotime($article[$i]->created_at)) }}</p>
                    </div>
                    <div class="w-[237px] h-[160px]
                    lg:w-[126px] lg:h-[85px]">
                        <img class="w-full h-full object-cover rounded-[5px]"
                            src="{{ asset('storage/' . $article[$i]->image) }}" alt="img-articel">
                    </div>
                </a>
            @endfor
        </div>
    </div>
    <div>
        <div class="flex items-center justify-center w-full py-10   lg:justify-between ">
            {{ $article->links('admin.pagination') }}
        </div>
    </div>
</section>
