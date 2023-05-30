<section class="bg-honeydew pt-38.5 pb-10
">
    <div class="flex justify-between w-full max-w-[1107px] mx-auto py-22
    lg:flex-col lg:py-0 lg:relative">
        <div class="w-full max-w-[620.37px] self-center
        lg:mx-auto lg:z-10">
            <div class="text-laurel-green  text-base font-poppins-semibold
            lg:text-center">SELAMAT DATANG
            </div>
            <div
                class="w-full max-w-[477px] text-[40px] text-arsenic font-poppins-bold my-4
            lg:text-center lg:text-[24px] lg:px-8 lg:mx-auto">
                {{ $profile->web_name }}
            </div>
            <div class="text-spanish-gray text-[20px] mb-9
            lg:text-center lg:px-8 lg:text-[12px]">
                {{ $profile->sub_web_name }}
            </div>
        </div>
        <div
            class="self-center relative flex
        lg:absolute lg:opacity-10 lg:bottom-2 lg:left-1/2 lg:-translate-x-1/2 lg:-translate-y-1/2 lg:w-36 lg:z-1 lg:top-1/2 lg:justify-center lg:h-[230px] lg:w-[150px]">
            <img class="object-cover lg:w-full lg:h-full lg:object-contain"
                src="{{ asset('storage/' . $profile->section1_img) }}" alt="varash-oil">
            <div class="relative w-33 lg:hidden">
                <div
                    class="absolute -rotate-90  w-128 h-33 text-[96px] top-1/2 -translate-y-1/2 -right-52 font-poppins-semibold text-center text-gray-5">
                    Varash Oil</div>
            </div>
        </div>
    </div>
</section>
