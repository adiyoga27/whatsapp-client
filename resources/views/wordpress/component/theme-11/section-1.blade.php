<section class=" custom-section-1 theme-10 pt-20
lg:pt-10">
    <div class=" w-full max-w-[1307px] relative mx-auto ">

        <div
            class="pt-60 flex justify-between w-full max-w-[1107px] mx-auto pt-22 pb-24 relative 
    lg:flex-col lg:px-8 lg:pb-10">
            <div class="w-full max-w-[528.37px] self-center lg:max-w-full">
                <div class="text-apple capitalize text-base font-kanit-semibold">Selamat Datang</div>
                <div
                    class="w-full max-w-[477px] text-[40px] text-arsenic font-poppins-semibold my-4
    lg:text-[24px]  ">
                    {{ $profile->web_name }}

                </div>
                <div
                    class="w-full max-w-[477px] text-spanish-gray text-[22px] font-poppins-regular mb-9
    lg:text-[12px] lg:max-w-full">
                    {{ $profile->sub_web_name }}
                </div>
            </div>
            <div class="self-center  flex flex-1 lg:mt-10 relative">
                <div
                    class="w-[514px] h-[586px] rounded-b-[10px] rounded-t-full bg-tea-green-1 relative z-10
                lg:w-[233px] lg:h-[265.64px]">
                </div>
                <div class=" absolute bottom-10  w-[546px] z-20 lg:w-[225px]
                lg:bottom-5">
                    <img class="relative z-10 w-[268px] h-[409.53px] mx-auto object-contain lg:w-[139.62px] lg:h-[203.78px] z-10"
                        src="{{ asset('storage/' . $profile->section1_img) }}" alt="varash-oil">
                    <div
                        class="absolute -bottom-10   left-2/3  -translate-x-1/2 z-20  
                        lg:-right-1/5 lg:-bottom-4">
                        <img class="w-[194px] h-[149px] object-contain 
                        lg:w-[62.7px] lg:h-[48.14px]"
                            src="{{ asset('/wordpress/img/background/cover-55.png') }}" alt="">
                    </div>
                    <div class="absolute -bottom-10 right-1/4 -translate-x-1/2 z-20
                    lg:left-1/3 ">
                        <img class="w-[252px] h-[190px] object-contain 
                    lg:w-[114.23px] lg:h-[86.13px]"
                            src="{{ asset('/wordpress/img/background/cover-56.png') }}" alt="">
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
