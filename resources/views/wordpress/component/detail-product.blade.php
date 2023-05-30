<section class="text-arsenic w-full pt-28 pb-20 font-poppins-regular
lg:pt-28">
    <div class="flex   gap-10 w-full max-w-[1107px] mx-auto  pb-10 relative testing px-[10px]
    lg:flex-col lg:pb-5">
        <div class="max-w-md
        lg:max-w-[200px] lg:mx-auto">
            <img class="object-cover w-full h-full rounded-lg " src="{{ asset('storage/' . $product->image) }}"
                alt="">
        </div>
        <div class="self-center select-none
        lg:self-start">
            <div class="mb-5">
                <h1 class="capitalize text-[32px] mb-2 text-start font-inter-bold
            lg:mb-2 lg:text-[24px]">
                    {{ $product->name }}</h1>
                <div class="font-poppins-regular text-arsenic-1 lg:text-[14px]">
                    <td>Harga:</td>
                    <td class="pl-4 ">Rp. <span class="price"> {{ number_format($product->price) }}</span></td>
                </div>
            </div>
            @if ($product->variant && count($product->variant))
                <div
                    class="font-poppins-regular text-spanish-gray text-left border-collapse border-slate-400 flex flex-col
            lg:text-[14px] ">
                    <div class="mb-[20px] lg:mb-[20px]">
                        @foreach ($product->variant as $key => $item)
                            <div class="mb-[10px] " id="{{ $key }}">
                                <div class="capitalize mb-1 text-arsenic-1">{{ $item->name }}</div>
                                <div colspan="2" class="flex gap-x-[15px] ">
                                    @foreach ($item->variant_detail as $data)
                                        <button
                                            class="cursor-pointer outline-0 variant border border-forest-green rounded-[8px] py-[9px] px-[26px] text-[14px]  self-center items-center text-forest-green hover:bg-forest-green  hover:text-white
                                    lg:text-[12px] lg:py-[9px] lg:px-[18px]"
                                            data-id="{{ $data->id }}">{{ $data->name }}</button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex gap-x-[10px] mb-[30px] lg:mb-[20px]">
                        <span class="self-center cursor-pointer change-qty" data-status="remove">
                            <svg class="lg:w-[26px] lg:h-[26px] object-contain" width="36" height="36"
                                viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1_913)">
                                    <path
                                        d="M4.5 18C4.5 19.7728 4.84919 21.5283 5.52763 23.1662C6.20606 24.8041 7.20047 26.2923 8.45406 27.5459C9.70765 28.7995 11.1959 29.7939 12.8338 30.4724C14.4717 31.1508 16.2272 31.5 18 31.5C19.7728 31.5 21.5283 31.1508 23.1662 30.4724C24.8041 29.7939 26.2923 28.7995 27.5459 27.5459C28.7995 26.2923 29.7939 24.8041 30.4724 23.1662C31.1508 21.5283 31.5 19.7728 31.5 18C31.5 16.2272 31.1508 14.4717 30.4724 12.8338C29.7939 11.1959 28.7995 9.70765 27.5459 8.45406C26.2923 7.20047 24.8041 6.20607 23.1662 5.52763C21.5283 4.84919 19.7728 4.5 18 4.5C16.2272 4.5 14.4717 4.84919 12.8338 5.52763C11.1959 6.20607 9.70765 7.20047 8.45406 8.45406C7.20047 9.70765 6.20606 11.1959 5.52763 12.8338C4.84919 14.4717 4.5 16.2272 4.5 18Z"
                                        stroke="#141821" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M13.5 18H22.5" stroke="#141821" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1_913">
                                        <rect width="36" height="36" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </span>
                        <span
                            class="self-center font-poppins-medium text-[24px]
                    lg:text-[18px] qty">0</span>
                        <span class="self-center cursor-pointer change-qty" data-status="add">
                            <svg class="lg:w-[26px] lg:h-[26px]  object-contain" width="36" height="36"
                                viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1_905)">
                                    <path
                                        d="M4.5 18C4.5 19.7728 4.84919 21.5283 5.52763 23.1662C6.20606 24.8041 7.20047 26.2923 8.45406 27.5459C9.70765 28.7995 11.1959 29.7939 12.8338 30.4724C14.4717 31.1508 16.2272 31.5 18 31.5C19.7728 31.5 21.5283 31.1508 23.1662 30.4724C24.8041 29.7939 26.2923 28.7995 27.5459 27.5459C28.7995 26.2923 29.7939 24.8041 30.4724 23.1662C31.1508 21.5283 31.5 19.7728 31.5 18C31.5 16.2272 31.1508 14.4717 30.4724 12.8338C29.7939 11.1959 28.7995 9.70765 27.5459 8.45406C26.2923 7.20047 24.8041 6.20607 23.1662 5.52763C21.5283 4.84919 19.7728 4.5 18 4.5C16.2272 4.5 14.4717 4.84919 12.8338 5.52763C11.1959 6.20607 9.70765 7.20047 8.45406 8.45406C7.20047 9.70765 6.20606 11.1959 5.52763 12.8338C4.84919 14.4717 4.5 16.2272 4.5 18Z"
                                        stroke="#141821" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M13.5 18H22.5" stroke="#141821" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M18 13.5V22.5" stroke="#141821" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1_905">
                                        <rect width="36" height="36" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </span>
                    </div>
                    <div>
                        <button disabled
                            class="rounded-[8px] bg-forest-green py-[14px] px-[30px] text-[15px] font-poppins-regular text-white disabled:opacity-60 disabled:cursor-no-drop
                        lg:px-[20px] lg:py-[10px] lg:text-[13px] submit-variant">Tambah
                            ke Keranjang</button>
                    </div>
                </div>
            @endif
            {{-- <div class="flex mt-10 gap-10">
                <img class="max-w-[80px]" src="https://saddannusantara.com/wp-content/uploads/2021/06/12.png"
                    alt="">
                <img class="max-w-[80px]" src="https://saddannusantara.com/wp-content/uploads/2021/06/14.png"
                    alt="">
            </div> --}}
        </div>
    </div>
    <div class="w-full max-w-[1107px] mx-auto pt-10 pb-52 relative testing lg:px-[10px]
    lg:pt-0 ">
        <h2 class="capitalize text-[22px] mb-4.25 text-start font-inter-bold
        lg:text-[14px] lg:mb-2">Deskripsi
        </h2>
        <div class="font-poppins-regular text-gray-1 text-start pb-11.25
        lg:text-[12px] ">
            {!! $product->description !!}
        </div>
    </div>
</section>
