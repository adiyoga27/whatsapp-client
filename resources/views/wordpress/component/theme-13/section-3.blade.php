<section class=" font-poppins-regular relative custom-section-3 theme-13
">
    <div class="w-full max-w-[1107px] mx-auto flex justify-start  pb-40 pt-20
    lg:flex-col-reverse px-6 lg:my-20">


        <div class="w-[550px] 
         lg:mx-auto lg:w-auto">
            <div class="relative ">
                <div class="flex lg:flex-col">
                    <div class="">
                        <img class="mr-auto w-[347px] object-contain
                        lg:w-[158px]"
                            src="{{ asset('storage/' . $profile->image1) }}" alt="image-1">
                    </div>
                    <div class="flex flex-col justify-between flex-1
                    lg:flex-row">
                        <img class=" w-[186px] h-[186px] object-contain
                        lg:w-[71.02px] lg:h-[71.02px] lg:self-start"
                            src="{{ asset('storage/' . $profile->image2) }}" alt="image-2">
                        <img class="  w-[186px] h-[186px] object-contain
                        lg:w-[71.02px] lg:h-[71.02px]"
                            src="{{ asset('storage/' . $profile->image3) }}" alt="image-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[383px] self-center lg:mb-10 lg:max-w-full">
            <div class="text-base text-apple font-poppins-semibold mb-1.5
            lg:text-[13px]">
                {{ $profile->section_name_3 }}</div>
            <div class="font-poppins-bold text-[40px] text-arsenic mb-5
            lg:text-[24px]">
                {{ $profile->section_title_3 }}</div>
            <div class="text-sm text-gray-9 mb-7 w-full max-w-[353px]
            lg:text-[13px] lg:max-w-full">
                {{ $profile->section_description_3 }}</div>
        </div>
    </div>
</section>
