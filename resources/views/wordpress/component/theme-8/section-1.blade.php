<section class="bg-tea-green pt-44 font-poppins-regular custom-section-1 theme-8 pb-20 lg:pt-32">
    <div class="max-w-[1107px] mx-auto flex  gap-x-10 flex-1
    lg:px-8 lg:flex-col">
        <div class="flex-1 max-w-[560px] pb-40
        lg:pb-10 lg:max-w-full">
            <div class="text-base text-arsenic
            lg:text-[13px]">Selamat Datang</div>
            <div
                class="text-[50px] leading-[68px] text-arsenic font-poppins-semibold mt-2.5 mb-1
            lg:text-[22px] lg:leading-[30px]">
                {{ $profile->web_name }}
            </div>
            <div class="font-poppins-regular text-spanish-gray-1 text-[20px]
            lg:text-[13px]">
                {{ $profile->sub_web_name }}
            </div>
        </div>
        <div class="self-center group-img flex-1 py-10 relative
        lg:self-center lg:w-full lg:flex">
            <div class="absolute bottom-0 left-1/2 -translate-x-1/2 ">
                <div
                    class="w-[200px] h-[200px] rounded-full bg-eton-blue mr-[250px] relative z-10
                lg:w-[100px] lg:h-[100px] lg:mr-[140px]">
                </div>
                <div
                    class="w-[60px] h-[60px] rounded-full bg-white mr-[0px] absolute bottom-0 left-40 z-0
                lg:left-16">
                </div>
            </div>
            <img class="object-contain w-[300px] mx-auto h-[300px] self-center
                    lg:w-[170px] lg:h-[170px] lg:items-center"
                src="{{ asset('storage/' . $profile->section1_img) }}" alt="img">
        </div>
    </div>
</section>
