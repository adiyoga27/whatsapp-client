<section class="w-full mx-auto max-w-[1107px] pt-28 pb-7">
    <div class="mb-20 lg:px-8">
        <div class="font-poppins-bold text-[32px]">Testimonial</div>
        <div class="font-poppins-regular text-[15px] text-gray-6 ">{{ count($testimonial) }} person who left a review
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10
    md:grid-cols-1 lg:px-8">
        @for ($i = 0; $i < count($testimonial); $i++)
            <div
                class="w-full max-w-[549px] shadow-custom-2 rounded-[5px] py-9 px-8 flex justify-between gap-x-5 testimoni-modal cursor-pointer
            lg:max-w-full">
                <div>
                    <div class="mb-5">
                        <svg width="36" height="29" viewBox="0 0 36 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.42716 4.95682C5.87019 2.30818 9.56696 0.965576 14.413 0.965576H16.1543V5.87452L14.7543 6.15489C12.3687 6.63202 10.7092 7.57063 9.82119 8.94806C9.35782 9.69011 9.09502 10.5398 9.0585 11.4139H14.413C14.8748 11.4139 15.3177 11.5973 15.6443 11.9239C15.9708 12.2505 16.1543 12.6934 16.1543 13.1552V25.3449C16.1543 27.2656 14.5923 28.8276 12.6717 28.8276H2.22392C1.7621 28.8276 1.3192 28.6442 0.992642 28.3176C0.666086 27.991 0.482629 27.5481 0.482629 27.0863V18.3794L0.487853 13.2963C0.472181 13.103 0.141335 8.52316 3.42716 4.95682ZM31.8259 28.8276H21.3782C20.9163 28.8276 20.4734 28.6442 20.1469 28.3176C19.8203 27.991 19.6369 27.5481 19.6369 27.0863V18.3794L19.6421 13.2963C19.6264 13.103 19.2956 8.52316 22.5814 4.95682C25.0244 2.30818 28.7212 0.965576 33.5672 0.965576H35.3085V5.87452L33.9085 6.15489C31.5229 6.63202 29.8635 7.57063 28.9754 8.94806C28.512 9.69011 28.2492 10.5398 28.2127 11.4139H33.5672C34.029 11.4139 34.4719 11.5973 34.7985 11.9239C35.125 12.2505 35.3085 12.6934 35.3085 13.1552V25.3449C35.3085 27.2656 33.7466 28.8276 31.8259 28.8276Z"
                                fill="#55B33F" />
                        </svg>
                    </div>
                    <div
                        class="font-kanit-regular text-gray-1 text-base mb-4 line-clamp-4 h-[95px] des
                lg:text-[13px]">
                        {!! $testimonial[$i]->description !!}
                    </div>
                    <div class="text-apple text-xl font-kanit-semibold title
                lg:text-[14px]">
                        {{ $testimonial[$i]->name }}
                    </div>
                </div>
                <div class="self-center">
                    <div class="w-26 h-26
                lg:w-[63px] lg:h-[63px]">
                        <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}" alt="avatar"
                            class="w-full h-full object cover rounded-full">
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
