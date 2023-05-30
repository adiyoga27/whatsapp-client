<section class="custom-section-8 theme-5  pt-10 pb-10">
    <div class="flex max-w-[1107px] mx-auto gap-6
    lg:flex-col lg:px-8">
        <div class="flex-1 max-w-[487.45px] mx-auto">
            <img class="w-[487.45px] h-[404px] mx-auto object-contain lg:w-[280px] lg:h-[232.06px]"
                src="{{ asset('/wordpress/img/img-people.png') }}" alt="">
        </div>
        <div class="self-center flex flex-col">
            <div
                class="font-poppins-semibold text-[40px] w-full max-w-[700px] text-arsenic self-center
            lg:text-[24px] lg:text-center">
                {{ $profile->tagline_section }}
            </div>
            <a href="https://wa.me/{{ $profile->whatsapp }}" class="lg:self-center" target="_blank">
                <button
                    class="font-poppins-semibold text-sm text-white  h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple mt-[24px]
            lg:mx-auto lg:self-center lg:text-[12px] lg:h-10 ">Order
                    via WA</button>
            </a>
        </div>
    </div>
</section>
