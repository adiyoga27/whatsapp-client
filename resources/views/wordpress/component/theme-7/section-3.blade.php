<section class=" pt-20 pb-10 font-poppins-regular relative ">
    <div class="w-full max-w-[1107px] mx-auto flex justify-between
    lg:flex-col-reverse lg:px-8">
        <div class="w-149 
        lg:w-auto lg:mb-10">
            <div class="relative ">
                <div class="w-[412px] h-[451px] mx-auto relative
                lg:w-[161px] lg:h-[179px]">
                    <div
                        class="w-[412px] h-[451px] absolute left-1/2 top-10 -translate-x-1/2
                    lg:w-[158px] lg:h-[174px] ">
                        <img class="object-contain w-full h-full" src="{{ asset('storage/' . $profile->image1) }}"
                            alt="image-1">
                    </div>
                </div>
                <div
                    class="absolute  -bottom-28 -left-0.5
                lg:-bottom-14 lg:left-1/2    lg:-translate-x-1/2  ">
                    <img class="  object-contain w-[200px]  h-[200px]
                    lg:w-[57.82px] lg:h-[57.82px] lg:mr-44 "
                        src="{{ asset('storage/' . $profile->image2) }}" alt="image-2">
                </div>
                <div class="absolute -top-10 -right-2
                 lg:right-1/2 lg:translate-x-1/2 lg:top-0 ">
                    <img class=" object-contain w-[177px] h-[177px]
                lg:w-[67.47px] lg:h-[76.14px] lg:ml-32"
                        src="{{ asset('storage/' . $profile->image3) }}" alt="image-3">
                </div>
            </div>
        </div>
        <div class="w-full max-w-[383px] self-center lg:max-w-full">
            <div class="text-base text-apple font-poppins-regular mb-1.5
            lg:text-[13px]">
                {{ $profile->section_name_3 }}</div>
            <div class="font-poppins-bold text-[40px] text-arsenic mb-5
            lg:text-[24px]">
                {{ $profile->section_title_3 }}</div>
            <div class="text-sm text-spanish-gray-1 mb-7 w-full max-w-[353px]
            lg:text-[13px] lg:max-w-full">
                {{ $profile->section_description_3 }}
            </div>
        </div>
    </div>
</section>
