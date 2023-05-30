<section class=" mt-80 pb-60 font-poppins-regular relative custom-section-2 theme-5 
lg:py-20 lg:mt-0">
    <div class="w-full max-w-[1107px] mx-auto flex justify-between
    lg:flex-col px-8">

        <div class="w-full max-w-[383px] self-center lg:max-w-full">
            <div class="text-base text-laurel-green font-poppins-semibold mb-1.5
            lg:text-[13px]">
                {{ $profile->section_name_3 }}</div>
            <div class="font-poppins-bold text-[40px] text-arsenic mb-5
            lg:text-[24px]">
                {{ $profile->section_title_3 }}</div>
            <div class="text-sm text-spanish-gray mb-7 w-full max-w-[353px]
            lg:text-[13px] lg:max-w-full">
                {{ $profile->section_description_3 }}</div>
        </div>
        <div class="w-149 
         lg:mx-auto lg:w-auto">
            <div class="relative ">
                <img class="mx-auto
                lg:w-[158px]" src="{{ asset('storage/' . $profile->image1) }}"
                    alt="image-1">
                <img class="absolute  bottom-0 -right-2
                lg:w-[114px] lg:-right-20"
                    src="{{ asset('storage/' . $profile->image2) }}" alt="image-2">
                <img class="absolute  bottom-0 -left-0.5
                lg:-left-10 lg:w-[68px]"
                    src="{{ asset('storage/' . $profile->image3) }}" alt="image-3">
            </div>
        </div>
    </div>
</section>
