<section class=" py-80 font-poppins-regular relative 
lg:py-20 lg:px-8">
    <div class="w-full max-w-[1107px] mx-auto flex-col ">

        <div class="w-full max-w-[383px] self-center mx-auto text-center  lg:max-w-full">
            <div class="text-base text-apple font-poppins-semibold mb-1.5
            lg:text-[13px]">
                {{ $profile->section_name_3 }}</div>
            <div class="font-poppins-bold text-[40px] text-arsenic mb-5
            lg:text-[24px]">
                {{ $profile->section_title_3 }}</div>
            <div class="text-sm text-gray-9 mb-7 w-full max-w-[353px]
            lg:text-[13px]  lg:max-w-full">
                {{ $profile->section_description_3 }}</div>
        </div>
        <div class="w-149  mx-auto lg:w-full">
            <div class="relative flex justify-center gap-x-3 ">
                <img class="  w-[178.41px] object-contain
                lg:w-[114px] "
                    src="{{ asset('storage/' . $profile->image2) }}" alt="image-2">
                <img class="w-[405px] h-[451px] lg:w-[158px] lg:h-[174px] object-contain"
                    src="{{ asset('storage/' . $profile->image1) }}" alt="image-1">
                <img class="    w-[178.41px] object-contain
                lg:w-[68px]"
                    src="{{ asset('storage/' . $profile->image3) }}" alt="image-3">
            </div>
        </div>
    </div>
</section>
