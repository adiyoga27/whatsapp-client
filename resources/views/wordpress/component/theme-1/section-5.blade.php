<section class="w-full max-w-[1107px] mx-auto py-38.5 text-center font-inter-regular
lg:px-8 lg:pb-10 lg:pt-20">
    <div
        class="uppercase text-[13px] mb-9.5 text-center mb-9.5 pb-2 text-center  relative
        after:content-[''] after:absolute after:w-6 after:h-0.5 after:bg-apple after:bottom-0 after:left-1/2 after:-translate-x-1/2
        lg:mb-6">
        TESTIMONIAL</div>
    <div class="uppercase text-[21px] mb-4.25 text-center">TESTIMONIAL PRODUK VARASH</div>
    <div class="text-sm text-gray-3 text-center">Lihat apa kata mereka yang sudah menggunakan produk varash</div>
    <div class="grid grid-cols-3 gap-x-15 text-left pt-13.75 pb-19
    lg:grid-cols-1 lg:pt-5 lg:pb-4 lg:gap-y-4">
        @for ($i = 0; $i < (count($testimonial) > 3 ? 3 : count($testimonial)); $i++)
            <div class="testimoni-modal cursor-pointer">
                <div class="mb-5 flex
                lg:mb-4">
                    <div class="w-14.5 h-14.5 ">
                        <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}"
                            class="w-full h-full object-cover rounded-full" alt="avatar">
                    </div>
                    <div class="self-center ml-2">
                        <div class="text-[15px] title">{{ $testimonial[$i]->name }}</div>
                    </div>
                </div>
                <div class="text-base line-clamp-6 h-[150px] des
                lg:text-[13px]">
                    {!! $testimonial[$i]->description !!}
                </div>
            </div>
        @endfor
    </div>
    <a href="/testimonial">
        <button
            class="font-inter-bold text-sm h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple text-white 
        lg:h-10 lg:text-[13px]">Lihat
            Semua</button>
    </a>
</section>
