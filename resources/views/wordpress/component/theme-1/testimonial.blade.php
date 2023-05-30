<section class="w-full mx-auto max-w-[1107px] pt-28 pb-7">
    <div class="mb-20 lg:px-8">
        <div class="font-poppins-bold text-[32px]">Testimonial</div>
        <div class="font-poppins-regular text-[15px] text-gray-6 ">{{ count($testimonial) }} person who left a review
        </div>
    </div>
    <div class="grid grid-cols-3 gap-10
    md:grid-cols-1 lg:px-8">
        @for ($i = 0; $i < count($testimonial); $i++)
            <div class="testimoni-modal cursor-pointer">
                <div class="mb-5 flex
            lg:mb-4">
                    <div class="w-14.5 h-14.5 ">
                        <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}"
                            class="w-full h-full object-cover rounded-full" alt="avatar">
                    </div>
                    <div class="self-center ml-2">
                        <div class="text-[15px] title">{{ $testimonial[$i]->name }}</div>
                    </div>
                </div>
                <div class="text-base line-clamp-6 h-[150px] des
            lg:text-[13px]">
                    {!! $testimonial[$i]->description !!}
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
