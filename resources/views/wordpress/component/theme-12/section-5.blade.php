<section class="py-24
">
    <div class="w-full max-w-[1107px] mx-auto lg:px-10">
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
    <div class=" py-[92px] lg:py-10 ">
        <div class="flex justify-center gap-x-[16px] mb-12  
        lg:flex-col lg:mt-10 lg:gap-y-10">
            @for ($i = 0; $i < (count($testimonial) > 3 ? 3 : count($testimonial)); $i++)
                <div
                    class="w-full max-w-[342px] rounded-[20px] py-[36px] px-[38px] relative  testimoni-modal cursor-pointer shadow-custom-7 bg-white
                lg:self-center">
                    <div class="mb-10">
                        <svg class="mx-auto" width="34" height="26" viewBox="0 0 34 26" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.88448 3.7245C5.26883 1.25287 8.8768 0 13.6064 0H15.3059V4.58087L13.9395 4.8425C11.6112 5.28775 9.99165 6.16362 9.12492 7.449C8.67268 8.14146 8.41619 8.93432 8.38056 9.75H13.6064C14.0571 9.75 14.4894 9.92121 14.8081 10.226C15.1268 10.5307 15.3059 10.944 15.3059 11.375V22.75C15.3059 24.5424 13.7815 26 11.9069 26H1.71015C1.25943 26 0.827159 25.8288 0.508448 25.5241C0.189736 25.2193 0.0106859 24.806 0.0106859 24.375V16.25L0.0157844 11.5066C0.000489182 11.3263 -0.322409 7.0525 2.88448 3.7245ZM30.6011 26H20.4043C19.9535 26 19.5213 25.8288 19.2026 25.5241C18.8839 25.2193 18.7048 24.806 18.7048 24.375V16.25L18.7099 11.5066C18.6946 11.3263 18.3717 7.0525 21.5786 3.7245C23.963 1.25287 27.5709 0 32.3005 0H34V4.58087L32.6336 4.8425C30.3054 5.28775 28.6858 6.16362 27.819 7.449C27.3668 8.14146 27.1103 8.93432 27.0747 9.75H32.3005C32.7513 9.75 33.1835 9.92121 33.5022 10.226C33.8209 10.5307 34 10.944 34 11.375V22.75C34 24.5424 32.4756 26 30.6011 26Z"
                                fill="#55B33F" />
                        </svg>
                    </div>
                    <div>
                        <div
                            class="font-poppins-regular text-spanish-gray-1 text-[13px] text-center mb-3 h-25 line-clamp-5 h-[95px] des">
                            {!! $testimonial[$i]->description !!}
                        </div>
                    </div>


                    <div class="self-center mt-10  text-center">
                        <div class="mb-2 ">
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
