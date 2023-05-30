<section class="pt-32  relative custom-section-1 theme-5
lg:pt-20 ">
    <div class="flex justify-between w-full max-w-[1107px] mx-auto pt-22 pb-52 relative testing
    lg:flex-col lg:px-8">
        <div class="w-full max-w-[620.37px]
        lg:max-w-full">
            <div class="text-apple capitalize text-base font-poppins-semibold">Selamat Datang</div>
            <div
                class="w-full max-w-[477px] text-[40px] text-arsenic font-poppins-semibold my-4
            lg:text-[24px]  lg:max-w-full lg:text-left">
                {{ $profile->web_name }}

            </div>
            <div
                class="w-full max-w-[477px] text-spanish-gray text-[20px] font-poppins-regular mb-9
            lg:text-[12px] lg:max-w-full">
                {{ $profile->sub_web_name }}
            </div>
        </div>
        <div class="self-center  flex 
         lg:mt-20">
            <div>
                <img class="z-10 absolute right-12 bottom-12 object-contain w-[256.95px] h-[360px]
                lg:w-[130px] lg:h-[184.75px]  lg:bottom-8 lg:left-1/2 lg:-translate-x-1/2 lg:ml-20"
                    src="{{ asset('storage/' . $profile->section1_img) }}" alt="varash-oil">
                <div class="">
                    <img class="absolute -right-16 -bottom-[450px]
                    lg:object-contain lg:max-w-[375px] lg:left-1/2 lg:-translate-x-1/2 lg:-bottom-[180px] lg:right-0"
                        src="{{ asset('/wordpress/img/background/hands.png') }}" alt="varash-oil">
                </div>
            </div>
        </div>
    </div>
</section>
