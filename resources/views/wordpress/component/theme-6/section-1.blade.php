<section class=" relative w-full max-w-[1307px] mx-auto custom-section-1 theme-6 pt-20
lg:pt-22">
    <div class="pt-60 flex justify-between w-full max-w-[1107px] mx-auto pt-22 pb-52 relative 
    lg:flex-col lg:px-8">
        <div class="w-full max-w-[620.37px] lg:max-w-full">
            <div class="text-apple capitalize text-base font-kanit-semibold">Selamat Datang</div>
            <div
                class="w-full max-w-[477px] text-[40px] text-arsenic font-poppins-semibold my-4
            lg:text-[24px]  ">
                {{ $profile->web_name }}

            </div>
            <div
                class="w-full max-w-[477px] text-spanish-gray-1 text-[22px] font-poppins-regular mb-9
            lg:text-[12px] lg:max-w-full">
                {{ $profile->sub_web_name }}
            </div>
        </div>
        <div class="self-center  relative flex-1 w-full">
            <div class="lg:mt-10 ">
                <img class="ml-auto relative z-10 w-[294px] h-[410px] lg:w-[147.25px] lg:h-[205.34px]  object-contain
                lg:mx-auto "
                    src="{{ asset('storage/' . $profile->section1_img) }}" alt="varash-oil">
                <img class="absolute -bottom-14 w-[426px] h-[230px] -right-20 z-20 object-contain
                lg:w-[213.36px] lg:h-[117px] lg:right-0 lg:left-1/2 lg:-translate-x-1/2"
                    src="{{ asset('/wordpress/img/background/cover-68.png') }}" alt="cover">
                <div
                    class="bg-gray-3 w-[379px] h-[121px] absolute z-0 blur-[65px] -bottom-14 -right-16 
                lg:w-[189.82px] lg:h-[60.6px] lg:right-0 lg:left-1/2 lg:-translate-x-1/2">
                </div>
            </div>
        </div>
    </div>
</section>
