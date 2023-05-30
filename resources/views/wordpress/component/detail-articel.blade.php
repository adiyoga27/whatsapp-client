<section class="text-arsenic w-full pt-28 pb-8 font-poppins-regular
lg:pt-28">
    <div class="w-full  max-w-[1107px] mx-auto ">
        <div
            class=" relative lg:h-[230px]
        lg:flex lg:flex-col lg:self-center lg:justify-center lg:items-center ">
            <div class="w-full h-[550px] lg:h-[250px]  lg:absolute lg:top-0 lg:left-0 z-0 ">
                <img class="w-full h-full object-cover  " src="{{ asset('storage/' . $article->image) }}" alt="">
            </div>
            <div class="absolute hidden w-full h-[240px] top-0  bg-black opacity-50 object-cover  lg:block "></div>
            <div
                class="mt-[40px] mb-9 flex flex-col self-center
            lg:mt-0 z-10 relative lg:flex-col-reverse lg:px-7 lg:text-white lg:mb-0  lg:w-full">
                <div class="font-inter-semibold text-[36px] mb-3 text-left
                lg:text-[20px]">
                    {{ $article->title }}
                </div>
                <div class="flex font-poppins-regular text-[20px]  gap-x-6
                lg:text-[11px]">
                    <div class="">{{ date('d M Y') }}</div>
                    {{-- <div>12.00 Wita</div> --}}
                </div>
            </div>
        </div>
        <div class="  z-10 relative
        lg:rounded-t-[10px] lg:bg-white lg:px-7 py-8">

            <div class="font-inter-regular text-[20px] text-left text-gray-1
            lg:text-[15px]">
                {!! $article->description !!}
            </div>
            <div class="font-inter-regural text-left text-gray-1 text-[14px] mt-5 md:text-[12px]">
                keyword: {{ $article->keyword }}
            </div>
        </div>
    </div>
</section>
