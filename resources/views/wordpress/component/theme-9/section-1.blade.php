<section class=" custom-section-1 theme-9 pt-20
lg:pt-10">
    <div class=" w-full max-w-[1307px] relative mx-auto ">

        <div
            class="pt-60 flex justify-between w-full max-w-[1107px] mx-auto pt-22 pb-52 relative 
    lg:flex-col lg:px-8 lg:pb-10">
            <div class="w-full max-w-[620.37px] lg:max-w-full">
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
            <div class="self-center  flex ">
                <div class="w-[294px] h-[410px] lg:w-[147.25px] lg:h-[205.34px] lg:mt-10">
                    <img class="z-10" class="w-full h-full object-contain"
                        src="{{ asset('storage/' . $profile->section1_img) }}" alt="varash-oil">
                </div>
            </div>
        </div>
    </div>
</section>
