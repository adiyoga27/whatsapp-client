<section class=" py-24 
lg:px-8">
    <div class="w-full max-w-[1107px] mx-auto">
        <div class="capitalize font-poppins-semibold text-xs mb-5 text-apple text-center
        lg:text-[13px]">
            Testimonial</div>
        <div
            class="font-inter-bold text-[40px] leading-[52px] mb-1 text-center text-arsenic capitalize
        lg:text-[24px]">
            Testimonial <br>
            <span class="text-apple">Produk Varash</span>
        </div>
        <div class="font-poppins-regular text-spanish-gray text-center pb-11.25 
        lg:text-[13px]">Berikut daftar
            dari produk varash
            yang
            kami buat
            untuk Anda.
        </div>
        <div class="flex justify-center gap-x-12.5 mb-12 mt-14
        lg:flex-col lg:mt-10 lg:gap-y-10">
            @for ($i = 0; $i < (count($testimonial) > 3 ? 3 : count($testimonial)); $i++)
                <div
                    class="w-full max-w-[342px] rounded-[20px] py-7 px-4 relative text-center testimoni-modal cursor-pointer shadow-custom-5 
                lg:self-center">
                    <div class="mb-5 ">
                        <svg class="mr-auto" width="36" height="29" viewBox="0 0 36 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.42716 4.95682C5.87019 2.30818 9.56696 0.965576 14.413 0.965576H16.1543V5.87452L14.7543 6.15489C12.3687 6.63202 10.7092 7.57063 9.82119 8.94806C9.35782 9.69011 9.09502 10.5398 9.0585 11.4139H14.413C14.8748 11.4139 15.3177 11.5973 15.6443 11.9239C15.9708 12.2505 16.1543 12.6934 16.1543 13.1552V25.3449C16.1543 27.2656 14.5923 28.8276 12.6717 28.8276H2.22392C1.7621 28.8276 1.3192 28.6442 0.992642 28.3176C0.666086 27.991 0.482629 27.5481 0.482629 27.0863V18.3794L0.487853 13.2963C0.472181 13.103 0.141335 8.52316 3.42716 4.95682ZM31.8259 28.8276H21.3782C20.9163 28.8276 20.4734 28.6442 20.1469 28.3176C19.8203 27.991 19.6369 27.5481 19.6369 27.0863V18.3794L19.6421 13.2963C19.6264 13.103 19.2956 8.52316 22.5814 4.95682C25.0244 2.30818 28.7212 0.965576 33.5672 0.965576H35.3085V5.87452L33.9085 6.15489C31.5229 6.63202 29.8635 7.57063 28.9754 8.94806C28.512 9.69011 28.2492 10.5398 28.2127 11.4139H33.5672C34.029 11.4139 34.4719 11.5973 34.7985 11.9239C35.125 12.2505 35.3085 12.6934 35.3085 13.1552V25.3449C35.3085 27.2656 33.7466 28.8276 31.8259 28.8276Z"
                                fill="#55B33F" />
                        </svg>
                    </div>
                    <div class="self-center mt-8 mb-6">
                        <div class="w-15.5 h-15.5 mx-auto">
                            <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}" alt="avatar"
                                class="w-full h-full object-cover rounded-full">
                        </div>
                        <div class="text-apple text-base font-kanit-semibold  title">{{ $testimonial[$i]->name }}
                        </div>
                    </div>
                    <div>

                        {{--  --}}
                        <div
                            class="font-poppins-regular text-spanish-gray-1 text-[13px] mb-3 h-25 line-clamp-5 h-[95px] des">
                            {!! $testimonial[$i]->description !!}
                        </div>
                    </div>
                    <div class="mt-5 text-right">
                        <svg class="ml-auto" width="36" height="29" viewBox="0 0 36 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.42716 4.95682C5.87019 2.30818 9.56696 0.965576 14.413 0.965576H16.1543V5.87452L14.7543 6.15489C12.3687 6.63202 10.7092 7.57063 9.82119 8.94806C9.35782 9.69011 9.09502 10.5398 9.0585 11.4139H14.413C14.8748 11.4139 15.3177 11.5973 15.6443 11.9239C15.9708 12.2505 16.1543 12.6934 16.1543 13.1552V25.3449C16.1543 27.2656 14.5923 28.8276 12.6717 28.8276H2.22392C1.7621 28.8276 1.3192 28.6442 0.992642 28.3176C0.666086 27.991 0.482629 27.5481 0.482629 27.0863V18.3794L0.487853 13.2963C0.472181 13.103 0.141335 8.52316 3.42716 4.95682ZM31.8259 28.8276H21.3782C20.9163 28.8276 20.4734 28.6442 20.1469 28.3176C19.8203 27.991 19.6369 27.5481 19.6369 27.0863V18.3794L19.6421 13.2963C19.6264 13.103 19.2956 8.52316 22.5814 4.95682C25.0244 2.30818 28.7212 0.965576 33.5672 0.965576H35.3085V5.87452L33.9085 6.15489C31.5229 6.63202 29.8635 7.57063 28.9754 8.94806C28.512 9.69011 28.2492 10.5398 28.2127 11.4139H33.5672C34.029 11.4139 34.4719 11.5973 34.7985 11.9239C35.125 12.2505 35.3085 12.6934 35.3085 13.1552V25.3449C35.3085 27.2656 33.7466 28.8276 31.8259 28.8276Z"
                                fill="#55B33F" />
                        </svg>
                    </div>

                </div>
            @endfor
        </div>
        <div class=" text-center">
            <a href="/testimonial">
                <button
                    class="font-poppins-semibold text-sm text-white  h-12 w-42.5 rounded-[5px] shadow-custom-1 bg-apple mx-auto 
                    lg:h-10 lg:text-[13px]">
                    Lihat Semua</button>
            </a>
        </div>
    </div>
</section>
