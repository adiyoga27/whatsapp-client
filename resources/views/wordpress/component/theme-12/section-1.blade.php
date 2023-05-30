<section class=" custom-section-1 theme-10 pt-20
lg:pt-10">
    <div class=" w-full max-w-[1307px] relative mx-auto ">

        <div
            class="pt-60 flex justify-between w-full max-w-[1107px] mx-auto pt-22 pb-24 relative 
    lg:flex-col lg:px-8 lg:pb-10 ">
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
            <div class="  flex flex-1 lg:py-10 relative">
                <img class="relative z-10 w-[218px] h-[359.53px] mx-auto object-contain lg:w-[139.62px] lg:h-[203.78px] z-10"
                    src="{{ asset('storage/' . $profile->section1_img) }}" alt="varash-oil">
                <div class="w-[78px] h-[78px] border-apple border-[3px] absolute bottom-0 right-0"></div>

            </div>


        </div>
    </div>
</section>
