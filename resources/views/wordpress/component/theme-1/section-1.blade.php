<section
    class="w-full max-w-[1107px]  mx-auto grid gap-x-20 text-arsenic font-inter-regular  pt-48 pb-20 custom-section-1 theme-1
    lg:gap-x-10 lg:px-8 lg:pb-10 lg:pt-36">
    <div class="picture self-center">
        <img class="object-contain w-[305px] h-[700px] mx-auto
        lg:w-[101px] lg:h-[193px]"
            src="{{ asset('storage/' . $profile->section1_img) }}" alt="">
    </div>
    <div class="w-full self-end max-w-[712px] title
    lg:self-center">
        <div
            class="uppercase text-xs pb-2 relative
        after:content-[''] after:absolute after:w-6 after:h-0.5 after:bg-apple after:bottom-0 after:left-0
        ">
            selamat datang</div>
        <div
            class="font-inter-semibold text-[58px] leading-[68px] my-7
        lg:text-[24px] lg:leading-[36px] lg:my-2">
            {{ $profile->web_name }}
        </div>
    </div>
    <div class="w-full self-start max-w-[712px] desc">
        <div class="font-inter-light text-[22px] mb-9
        lg:text-[12px] lg:mt-2 lg:mb-0">
            {{ $profile->sub_web_name }}</div>
    </div>
</section>
