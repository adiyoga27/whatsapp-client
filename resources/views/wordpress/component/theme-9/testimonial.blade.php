<section class="w-full mx-auto max-w-[1107px] pt-28">
    <div class="mb-20 lg:px-8">
        <div class="font-poppins-bold text-[32px]">Testimonial</div>
        <div class="font-poppins-regular text-[15px] text-gray-6 ">{{ count($testimonial) }} person who left a review
        </div>
    </div>
    <div class="grid grid-cols-3 gap-10
    md:grid-cols-1 lg:px-8">
        @for ($i = 0; $i < count($testimonial); $i++)
            <div
                class="w-full max-w-[342px] rounded-[20px] py-[36px] px-[38px] relative  testimoni-modal cursor-pointer shadow-custom-7 bg-white
    lg:self-center">

                <div>
                    <div
                        class="font-poppins-regular text-spanish-gray-1 text-[13px] mb-3 h-25 line-clamp-5 h-[95px] des">
                        {!! $testimonial[$i]->description !!}
                    </div>
                </div>

                <div class="self-center mt-10 flex gap-x-[12px]">
                    <div class=" ">
                        <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}" alt="avatar"
                            class="w-[57px] h-[57px] mx-auto object-cover rounded-full">
                    </div>
                    <div class="text-arsenic text-base font-poppins-semibold title self-center">
                        {{ $testimonial[$i]->name }}
                    </div>
                </div>

            </div>
        @endfor
    </div>

    <div class="font-inter-regular mt-10">
        <div class="flex items-center justify-center w-full py-10   lg:justify-between ">

            {{ $testimonial->links('admin.pagination') }}
        </div>
    </div>
</section>
