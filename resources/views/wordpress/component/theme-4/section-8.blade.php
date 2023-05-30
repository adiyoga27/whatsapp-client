<section class="w-full max-w-[1107px] mx-auto flex pt-22 pb-40 gap-x-[97px]
lg:flex-col-reverse lg:flex-col">
    <div class="w-[411px] h-[431px] relative bg-honeydew
    lg:w-[170.05px] lg:h-[178px] lg:mx-auto">
        <div class="absolute right-10 -bottom-20 
         lg:right-5 lg:-bottom-5">
            <img class="object-contain w-[291px] h-[407.7px] lg:w-[120.4px] lg:h-[168.69px]"
                src="{{ asset('storage/' . $profile->tagline_img) }}" alt="varash-oil">
        </div>
    </div>
    <div class="self-end max-w-[527px]
    lg:max-w-full lg:mb-10 lg:self-center">
        <div class="font-poppins-semibold text-[40px]
        lg:text-[24px] lg:px-8 lg:text-center">
            {{ $profile->tagline_section }}

        </div>
        <div class="mt-20 lg:text-center lg:mt-4 lg:mb-4">
            <a href="https://wa.me/{{ $profile->whatsapp }}" target="_blank">
                <button
                    class="font-inter-bold text-sm h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple text-white
        lg:text-[13px] lg:h-10">Order
                    via WA</button>
            </a>
        </div>
    </div>
</section>
