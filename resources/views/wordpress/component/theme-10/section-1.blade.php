<section class=" custom-section-1 theme-10 pt-20
lg:pt-10">
    <div class=" w-full max-w-[1307px] relative mx-auto ">

        <div
            class="pt-60 flex justify-between w-full max-w-[1107px] mx-auto pt-22 pb-24 relative 
    lg:flex-col-reverse lg:px-8 lg:pb-10">
            <div class="self-center  flex flex-1 lg:mt-10 relative">
                <div
                    class="w-[476px] h-[604px] rounded-b-[10px] rounded-tr-[100px] bg-honeydew relative z-10
                lg:w-[225px] lg:h-[225px]">
                </div>
                <div
                    class="w-[476px] h-[604px] rounded-b-[10px] rounded-tr-[100px] border-honeydew border-[5px] absolute -top-6 right-20 z-0
                    lg:w-[225px] lg:h-[225px] lg:-right-3 ">
                </div>
                <div class=" absolute top-1/2 -translate-y-1/2 w-[476px] z-20 lg:w-[225px]">
                    <img class="relative z-10 w-[194px] h-[310px] mx-auto object-contain lg:w-[100.25px] lg:h-[185.34px] z-10"
                        src="{{ asset('storage/' . $profile->section1_img) }}" alt="varash-oil">
                    <div
                        class="absolute top-1/2 -translate-y-1/2 left-1/3 -translate-x-1/2 z-1 
                    lg:left-1/3 ">
                        <img class="w-[320.04px] h-[274.04px] object-contain
                        lg:w-[150px] lg:h-[150px]"
                            src="{{ asset('/wordpress/img/background/cover-49.png') }}" alt="">
                    </div>
                    <div
                        class="absolute top-1/2 -translate-y-1/2 -right-1/3 -translate-x-1/2 z-1
                    lg:-right-1/3 ">
                        <img class="w-[320.04px] h-[274.04px] object-contain
                        lg:w-[150px] lg:h-[150px]"
                            src="{{ asset('/wordpress/img/background/cover-50.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="w-full max-w-[528.37px] lg:max-w-full">
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

        </div>
    </div>
</section>
