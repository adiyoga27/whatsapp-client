<section class="custom-contact ">
    <div class="flex max-w-[1107px] mx-auto gap-x-10 pt-56 pb-32
    lg:flex-col lg:gap-y-5 lg:px-10 lg:pt-28">
        <div class="self-center">
            <div class="font-poppins-bold text-[40px] mb-4
            lg:text-[24px]">Kontak Kami</div>
            <div class="font-poppins-regular text-[15px] text-arsenic
            lg:text-[11px]">Jangan ragu untuk
                menghubungi kami kapan saja kami
                akan
                menghubungi Anda sesegera mungkin</div>

        </div>
        <div class="bg-apple text-white px-11 py-9 rounded-[5px] w-full max-w-[521px]
        lg:px-6 lg:py-5">
            <div class="font-poppins-bold text-[36px] mb-10
            lg:text-[24px] lg:mb-5">Info</div>
            <div class="flex flex-col gap-y-7 font-inter-regular text-[18px]
            lg:text-[15px] lg:gap-y-4">
                <div class="flex gap-x-5
                lg:gap-x-2">
                    <div class="min-w-[40px] self-center
                    lg:min-w-[30px]">
                        <svg class="lg:w-6 lg:h-6" width="36" height="36" viewBox="0 0 36 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_601_371)">
                                <path
                                    d="M18 21C20.4853 21 22.5 18.9853 22.5 16.5C22.5 14.0147 20.4853 12 18 12C15.5147 12 13.5 14.0147 13.5 16.5C13.5 18.9853 15.5147 21 18 21Z"
                                    stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M26.4855 24.9855L20.121 31.35C19.5585 31.912 18.7959 32.2277 18.0008 32.2277C17.2056 32.2277 16.443 31.912 15.8805 31.35L9.51451 24.9855C7.83634 23.3073 6.69351 21.1691 6.23054 18.8413C5.76756 16.5136 6.00524 14.1008 6.91351 11.9081C7.82178 9.71547 9.35985 7.84136 11.3332 6.52281C13.3066 5.20426 15.6267 4.50049 18 4.50049C20.3734 4.50049 22.6934 5.20426 24.6668 6.52281C26.6402 7.84136 28.1782 9.71547 29.0865 11.9081C29.9948 14.1008 30.2324 16.5136 29.7695 18.8413C29.3065 21.1691 28.1637 23.3073 26.4855 24.9855Z"
                                    stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_601_371">
                                    <rect width="36" height="36" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="self-center ">{{ $profile->store_address }}</div>
                </div>
                <div class="flex gap-x-5
                lg:gap-x-2">
                    <div class="min-w-[40px] self-center
                    lg:min-w-[30px]">
                        <svg class="lg:w-6 lg:h-6" width="36" height="36" viewBox="0 0 36 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_601_381)">
                                <path
                                    d="M28.5 7.5H7.5C5.84315 7.5 4.5 8.84315 4.5 10.5V25.5C4.5 27.1569 5.84315 28.5 7.5 28.5H28.5C30.1569 28.5 31.5 27.1569 31.5 25.5V10.5C31.5 8.84315 30.1569 7.5 28.5 7.5Z"
                                    stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.5 10.5L18 19.5L31.5 10.5" stroke="white" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_601_381">
                                    <rect width="36" height="36" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </div>
                    <div class="self-center">{{ $profile->email }}</div>
                </div>
                <div class="flex gap-x-5
                lg:gap-x-2">
                    <div class="min-w-[40px] self-center
                    lg:min-w-[30px]">
                        <svg class="lg:w-6 lg:h-6" width="36" height="36" viewBox="0 0 36 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_601_391)">
                                <path
                                    d="M7.5 6H13.5L16.5 13.5L12.75 15.75C14.3564 19.0073 16.9927 21.6436 20.25 23.25L22.5 19.5L30 22.5V28.5C30 29.2956 29.6839 30.0587 29.1213 30.6213C28.5587 31.1839 27.7956 31.5 27 31.5C21.1489 31.1444 15.6302 28.6597 11.4852 24.5148C7.34026 20.3698 4.85557 14.8511 4.5 9C4.5 8.20435 4.81607 7.44129 5.37868 6.87868C5.94129 6.31607 6.70435 6 7.5 6Z"
                                    stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_601_391">
                                    <rect width="36" height="36" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </div>
                    <div class="self-center">{{ $profile->phone_cs_1 }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
