<section class="w-full mx-auto max-w-[1107px] pt-28 pb-7">
    <div class="mb-20 lg:px-8">
        <div class="font-poppins-bold text-[32px]">Testimonial</div>
        <div class="font-poppins-regular text-[15px] text-gray-6 ">{{ count($testimonial) }} person who left a review
        </div>
    </div>
    <div class="grid grid-cols-4 gap-x-10 gap-y-20
    md:grid-cols-1 lg:px-8">
        @for ($i = 0; $i < count($testimonial); $i++)
            <div
                class="w-full max-w-[232px] shadow-custom-3 rounded-[5px] py-7 px-4 relative text-center testimoni-modal cursor-pointer
        lg:self-center lg:max-w-full">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2">
                    <div class="w-26 h-26">
                        <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}" alt="avatar"
                            class="w-full h-full object cover rounded-full">
                    </div>
                </div>
                <div>
                    <div class="my-5">
                        <svg width="36" height="29" viewBox="0 0 36 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.42716 4.95682C5.87019 2.30818 9.56696 0.965576 14.413 0.965576H16.1543V5.87452L14.7543 6.15489C12.3687 6.63202 10.7092 7.57063 9.82119 8.94806C9.35782 9.69011 9.09502 10.5398 9.0585 11.4139H14.413C14.8748 11.4139 15.3177 11.5973 15.6443 11.9239C15.9708 12.2505 16.1543 12.6934 16.1543 13.1552V25.3449C16.1543 27.2656 14.5923 28.8276 12.6717 28.8276H2.22392C1.7621 28.8276 1.3192 28.6442 0.992642 28.3176C0.666086 27.991 0.482629 27.5481 0.482629 27.0863V18.3794L0.487853 13.2963C0.472181 13.103 0.141335 8.52316 3.42716 4.95682ZM31.8259 28.8276H21.3782C20.9163 28.8276 20.4734 28.6442 20.1469 28.3176C19.8203 27.991 19.6369 27.5481 19.6369 27.0863V18.3794L19.6421 13.2963C19.6264 13.103 19.2956 8.52316 22.5814 4.95682C25.0244 2.30818 28.7212 0.965576 33.5672 0.965576H35.3085V5.87452L33.9085 6.15489C31.5229 6.63202 29.8635 7.57063 28.9754 8.94806C28.512 9.69011 28.2492 10.5398 28.2127 11.4139H33.5672C34.029 11.4139 34.4719 11.5973 34.7985 11.9239C35.125 12.2505 35.3085 12.6934 35.3085 13.1552V25.3449C35.3085 27.2656 33.7466 28.8276 31.8259 28.8276Z"
                                fill="#55B33F" />
                        </svg>
                    </div>
                    <div class="text-apple text-base font-kanit-semibold mb-3 title">{{ $testimonial[$i]->name }}</div>
                    <div class="font-poppins-regular text-gray-1 text-xs mb-3 h-25 line-clamp-6 h-[95px] des">
                        {!! $testimonial[$i]->description !!}
                    </div>
                    <div class="float-right">
                        <svg width="27" height="21" viewBox="0 0 27 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.5722 17.8853C22.6893 19.8698 19.84 20.8757 16.105 20.8757H14.763V17.1977L15.842 16.9876C17.6806 16.6301 18.9596 15.9269 19.6441 14.8948C20.0012 14.3388 20.2038 13.7022 20.2319 13.0473H16.105C15.7491 13.0473 15.4077 12.9098 15.156 12.6651C14.9044 12.4205 14.763 12.0886 14.763 11.7426V2.60938C14.763 1.17025 15.9668 -9.91821e-05 17.4471 -9.91821e-05H25.4996C25.8555 -9.91821e-05 26.1969 0.137363 26.4486 0.38205C26.7003 0.626736 26.8417 0.958601 26.8417 1.30464V7.82834L26.8376 11.6369C26.8497 11.7817 27.1047 15.2132 24.5722 17.8853ZM2.68425 -9.91821e-05H10.7367C11.0927 -9.91821e-05 11.434 0.137363 11.6857 0.38205C11.9374 0.626736 12.0788 0.958601 12.0788 1.30464V7.82834L12.0748 11.6369C12.0869 11.7817 12.3418 15.2132 9.80935 17.8853C7.92641 19.8698 5.07718 20.8757 1.34217 20.8757H9.53674e-05V17.1977L1.07913 16.9876C2.91777 16.6301 4.19677 15.9269 4.88123 14.8948C5.23837 14.3388 5.44092 13.7022 5.46907 13.0473H1.34217C0.986233 13.0473 0.644869 12.9098 0.393181 12.6651C0.141493 12.4205 9.53674e-05 12.0886 9.53674e-05 11.7426V2.60938C9.53674e-05 1.17025 1.20394 -9.91821e-05 2.68425 -9.91821e-05Z"
                                fill="#55B33F" />
                        </svg>

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
