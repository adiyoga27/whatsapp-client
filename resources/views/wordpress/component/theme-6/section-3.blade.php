<section class=" pt-10 pb-10 font-poppins-regular relative custom-section-2 theme-6
lg:pt-0">
    <div class="w-full max-w-[1107px] mx-auto flex justify-between
    lg:flex-col-reverse lg:px-8">
        <div class="w-149 
        lg:w-auto lg:mt-10">
            <div class="relative ">
                <div class="w-[412px] h-[451px] mx-auto relative
                lg:w-[161px] lg:h-[179px] ">
                    <img class="object-contain w-full h-full relative"
                        src="{{ asset('/wordpress/img/background/cover-18.png') }}" alt="image-cover">
                    <div
                        class="w-[412px] h-[451px] absolute -left-10 top-10
                    lg:w-[158px] lg:h-[174px] lg:left-1/3 lg:-translate-x-1/2">
                        <img class="object-contain w-full h-full relative"
                            src="{{ asset('storage/' . $profile->image1) }}" alt="image-1">
                    </div>
                </div>
                <img class="absolute  -top-10 -right-2 object-contain
                lg:w-[57.82px] lg:h-[57.82px] lg:ml-14 lg:top-3 lg:left-1/2 lg:-right-0 lg:-translate-x-1/2"
                    src="{{ asset('storage/' . $profile->image2) }}" alt="image-2">
                <img class="absolute  -bottom-28 -left-0.5 object-contain
                lg:w-[67.47px] lg:h-[76.14px] lg:left-1/2 lg:-translate-x-1/2 lg:-ml-24 lg:-bottom-16"
                    src="{{ asset('storage/' . $profile->image3) }}" alt="image-3">
            </div>
        </div>
        <div class="w-full max-w-[383px] self-center lg:max-w-full">
            <div class="text-base text-apple font-poppins-semibold mb-1.5
            lg:text-[13px]">
                {{ $profile->section_name_3 }}</div>
            <div class="font-poppins-bold text-[40px] text-arsenic mb-5
            lg:text-[24px]">
                {{ $profile->section_title_3 }}</div>
            <div class="text-sm text-spanish-gray mb-7 w-full max-w-[353px]
            lg:text-[13px]">
                {{ $profile->section_description_3 }}
            </div>
        </div>
    </div>
</section>
