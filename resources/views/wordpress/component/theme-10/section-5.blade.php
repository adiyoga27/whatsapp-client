<section class="py-24 custom-section-5 theme-10
">
    <div class="w-full max-w-[1107px] mx-auto lg:px-8">
        <div class="capitalize font-poppins-semibold text-xs mb-5 text-apple text-center
        lg:text-[13px]">
            Testimonial</div>
        <div
            class="font-inter-bold text-[40px] leading-[52px] mb-1 text-center text-arsenic capitalize
        lg:text-[24px]">
            Testimonial <br>
            <span class="text-apple">Produk Varash</span>
        </div>
        <div class="font-poppins-regular text-spanish-gray text-center pb-11.25 
        lg:text-[13px]">Berikut daftar
            dari produk varash
            yang
            kami buat
            untuk Anda.
        </div>
    </div>
    <div class=" py-[92px] lg:py-20 ">
        <div class="flex justify-center gap-x-[16px] mb-12  
        lg:flex-col lg:mt-10 lg:gap-y-10">
            @for ($i = 0; $i < (count($testimonial) > 3 ? 3 : count($testimonial)); $i++)
                <div
                    class="w-full max-w-[342px] rounded-[20px] py-[36px] px-[38px] relative  testimoni-modal cursor-pointer shadow-custom-7 bg-white
                lg:self-center">

                    <div>
                        <div
                            class="font-poppins-regular text-spanish-gray-1 text-[13px] mb-3 h-25 line-clamp-5 h-[95px] des">
                            {!! $testimonial[$i]->description !!}
                        </div>
                    </div>

                    <div class="self-center mt-10 flex gap-x-[12px]">
                        <div class=" ">
                            <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}" alt="avatar"
                                class="w-[57px] h-[57px] mx-auto object-cover rounded-full">
                        </div>
                        <div class="text-arsenic text-base font-poppins-semibold title self-center">
                            {{ $testimonial[$i]->name }}
                        </div>
                    </div>

                </div>
            @endfor
        </div>
        <div class=" text-center">
            <a href="/testimonial">
                <button
                    class="font-poppins-semibold text-sm text-white  h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple mx-auto 
                    lg:h-10 lg:text-[13px]">
                    Lihat Semua</button>
            </a>
        </div>
    </div>
</section>
