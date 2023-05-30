<section class="w-full max-w-[1107px] mx-auto  flex gap-x-[90px] py-20
lg:flex-col-reverse lg:px-8 lg:gap-y-10">
    <div class=" ">
        <img class="w-[291px] h-[407px] lg:w-[139.69px] lg:h-[195.72px] object-contain 
        lg:mx-auto"
            src="{{ asset('storage/' . $profile->tagline_img) }}" alt="img-minyak">
    </div>
    <div class="self-center flex flex-col">
        <div
            class="font-poppins-semibold text-[40px] w-full max-w-[527px] text-arsenic mb-12
        lg:text-[24px] lg:text-center lg:mb-5">
            {{ $profile->tagline_section }}
        </div>
        <a href="https://wa.me/{{ $profile->whatsapp }}" class="lg:self-center" target="_blank">
            <button
                class="font-inter-bold text-sm h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple text-white
        lg:self-center lg:h-10 lg:text-[13px] lg:mx-auto ">Order
                via WA</button>
        </a>
    </div>
</section>
