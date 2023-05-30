<section class=" font-poppins-regular relative 
">
    <div class="w-full max-w-[1107px] mx-auto flex justify-start  pb-80 pt-20
    lg:flex-col-reverse px-6 lg:py-22">
        <div class="w-[550px] 
         lg:mx-auto lg:w-auto lg:mt-10">
            <div class="relative ">
                <img class="mx-auto w-[347px] object-contain
                lg:w-[158px]"
                    src="{{ asset('storage/' . $profile->image1) }}" alt="image-1">
                <img class="absolute  -top-20 right-0 w-[192px] object-contain
                lg:w-[72px] lg:-right-10 lg:-top-10"
                    src="{{ asset('storage/' . $profile->image2) }}" alt="image-2">
                <img class="absolute  -bottom-16 left-0 w-[162px] object-contain
                lg:-left-10 lg:w-[57.82px] lg:-bottom-8"
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
            <div class="text-sm text-gray-9 mb-7 w-full max-w-[353px]
            lg:text-[13px] lg:max-w-full">
                {{ $profile->section_description_3 }}</div>
        </div>
    </div>
</section>
