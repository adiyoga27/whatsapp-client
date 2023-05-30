<section
    class="font-inter-regular w-full max-w-[1107px] mx-auto flex justify-between pt-40 relative
lg:flex-col lg:px-8 lg:before:hidden lg:pt-20">
    <div class="w-full max-w-[355.29px] self-center
    lg:mb-10 lg:text-center lg:max-w-full">
        <div
            class="uppercase text-[13px] mb-8.25 pb-2 relative
        after:content-[''] after:absolute after:w-6 after:h-0.5 after:bg-apple after:bottom-0 after:left-0
        lg:after:-translate-x-1/2 lg:after:left-1/2 lg:mb-2">
            {{ $profile->section_name_3 }}</div>
        <div class="text-[21px] mb-1.5">{{ $profile->section_title_3 }}</div>
        <div class="text-sm mb-9.75 lg:text-spanish-gray-1 lg:text-[12px]">{{ $profile->section_description_3 }}</div>
    </div>
    <div class="w-149 
    lg:w-full">
        <div class="relative">
            <img class="mx-auto w-[347px] h-[380px] object-cover
            lg:w-[159px] lg:h-[174px]"
                src="{{ asset('storage/' . $profile->image1) }}" alt="image-1">
            <img class="absolute  bottom-0 -right-2 w-[249px] h-[281px] object-cover
            lg:w-[114.65px] lg:h-[129.38px] lg:right-auto lg:left-1/2 lg:ml-10"
                src="{{ asset('storage/' . $profile->image2) }}" alt="image-2">
            <img class="absolute  bottom-0 left-4 w-[150px] h-[150px] object-cover
            lg:w-[69.06px] lg:h-[69.06px] lg:right-1/2 lg:left-auto lg:mr-12"
                src="{{ asset('storage/' . $profile->image3) }}" alt="image-3">
        </div>
    </div>
</section>
