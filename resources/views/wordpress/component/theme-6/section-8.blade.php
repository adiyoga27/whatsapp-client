<section class="bg-smith-apple mt-[250px] mb-[210px]
lg:mt-[0px]">
    <div class="w-full max-w-[1107px] mx-auto flex justify-between relative
    lg:max-w-full lg:px-8 lg:flex-col">
        <div class="self-center py-[60px]
        lg:flex lg:flex-col">
            <div
                class="font-poppins-semibold text-[40px] max-w-[662px] text-white   mb-5
            lg:text-[24px] lg:text-center">
                {{ $profile->tagline_section }}
            </div>
            <a href="https://wa.me/{{ $profile->whatsapp }}" class="text-center" target="_blank">
                <button
                    class="font-poppins-semibold text-sm text-apple  h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-white 
                 lg:h-10 lg:self-center lg:bg-apple lg:text-white ">
                    Order via WA</button>
            </a>
        </div>
        <div
            class="absolute bottom-0 right-0 w-[485px]
        lg:left-1/2 lg:-translate-x-1/2 lg:-bottom-[190px] lg:w-[195.78px]">
            <img class="w-full h-full object-contain relative" src="{{ asset('/wordpress/img/img-people-2.png') }}"
                alt="img-2">
        </div>
    </div>
</section>
