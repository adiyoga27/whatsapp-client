<section class="w-full max-w-[1107px] mx-auto flex justify-between pt-25.75
lg:flex-col relative" id="tentang">
    <div class="w-full max-w-[383px] self-center
    lg:mx-auto lg:px-8 lg:text-center lg:max-w-full">
        <div class="text-base text-laurel-green mb-1.5
        lg:text-[13px]">
            {{ $profile->section_name_3 }}
        </div>
        <div class="font-poppins-bold text-[40px] text-arsenic mb-5
        lg:text-[24px]">
            {{ $profile->section_title_3 }}
        </div>
        <div class="text-sm text-spanish-gray mb-7
        lg:text-[13px]">
            {{ $profile->section_description_3 }}

        </div>
    </div>
    <div class="w-149
    lg:w-80 lg:mx-auto">
        <div
            class="relative
            before:content-[''] before:w-102.75 before:h-125.75 before:bg-[#EEFDEB] before:absolute before:-top-20 before:-right-2 before:-z-10
            lg:hidden">
            <img class="mx-auto" src="{{ asset('/wordpress/img/rosevara-lemon.png') }}" alt="image-1">
            <img class="absolute  bottom-0 -right-2" src="{{ asset('/wordpress/img/rosevara-citronella.png') }}"
                alt="image-2">
            <img class="absolute  bottom-0 -left-0.5" src="{{ asset('/wordpress/img/rosevara-nutmeg.png') }}"
                alt="image-3">
        </div>
        <div class="relative mt-10 hidden
        lg:block">
            <img class="mx-auto
            lg:w-[147px]" src="{{ asset('/wordpress/img/rosevara-lemon.png') }}"
                alt="image-1">
            <img class="absolute  bottom-0 -right-2
            lg:w-[105.88px] lg:right-10 lg:-bottom-10"
                src="{{ asset('/wordpress/img/rosevara-citronella.png') }}" alt="image-2">
            <img class="absolute  bottom-0 -left-0.5
            lg:w-[105.88px] lg:-top-10 lg:left-8"
                src="{{ asset('/wordpress/img/rosevara-nutmeg.png') }}" alt="image-3">
        </div>
    </div>
</section>
