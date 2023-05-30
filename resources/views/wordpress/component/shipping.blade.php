<section class="max-w-[1107px] mx-auto py-44 
lg:px-3 md:py-20">
    <div class="mb-20 md:mb-5 md:mt-10 ">
        <div class="font-poppins-bold text-[32px] text-[32px] md:text-[20px]">Pengiriman</div>
    </div>
    <div class="flex gap-x-[19px] cart lg:flex-col  lg:gap-y-[30px] ">
        <div>
            <div class="flex-1 item-cart mb-3">
                <div class="font-poppins-regular text-base">Tidak ada data</div>
            </div>

            <div
                class="shadow-custom-8 p-[46px] rounded-[20px] w-[523px] select-none
            lg:w-full lg:p-[30px] md:p-[24px]">
                <div class="text-arsenic-1 font-poppins-semibold text-[32px] mb-6 lg:text-[24px] md:text-[19px]">Rincian
                    Pembayaran</div>
                <form action="" id="form_submit" autocomplete="off" class="font-poppins-regular">
                    <div class="grid grid-cols-2 gap-x-[10px] gap-y-6 mb-6 md:grid-cols-1">
                        <div>
                            <input placeholder="Nama Lengkap" name="customer_name" type="text"
                                class="w-full py-[15px] px-[25px] rounded-[8px] border-forest-green text-arsenic-1 text-[14px]   outline-0
                                focus:ring-transparent focus:border-forest-green placeholder:text-light-silver
                                md:text-[12px] md:py-[10px] md:px-[16px]"
                                required>
                        </div>
                        <div>
                            <input placeholder="Nomor Telephone" name="customer_phone" type="number" min="0"
                                class="w-full py-[15px] px-[25px] rounded-[8px] border-forest-green text-arsenic-1 text-[14px]   outline-0
                            focus:ring-transparent focus:border-forest-green placeholder:text-light-silver
                            md:text-[12px] md:py-[10px] md:px-[16px]"
                                required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <select type="text" name="province"
                            class="province w-full py-[15px] px-[25px] rounded-[8px] border-forest-green text-arsenic-1 text-[14px]   outline-0
                                focus:ring-transparent focus:border-forest-green placeholder:text-light-silver
                                md:text-[12px] md:py-[10px] md:px-[16px]"
                            required>

                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-x-[10px] gap-y-6 mb-6 md:grid-cols-1">
                        <div>
                            <select type="text" name="city"
                                class="city w-full py-[15px] px-[25px] rounded-[8px] border-forest-green text-arsenic-1 text-[14px]   outline-0
                                focus:ring-transparent focus:border-forest-green placeholder:text-light-silver
                                md:text-[12px] md:py-[10px] md:px-[16px]"
                                required>
                            </select>
                        </div>
                        <div>
                            <select type="text" name="subdistrict"
                                class="subdistrict w-full py-[15px] px-[25px] rounded-[8px] border-forest-green text-arsenic-1 text-[14px]   outline-0
                                focus:ring-transparent focus:border-forest-green placeholder:text-light-silver
                                md:text-[12px] md:py-[10px] md:px-[16px]"
                                required>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <textarea name="address" placeholder="Alamat" rows="6"
                            class="w-full py-[15px] px-[25px] rounded-[8px] border-forest-green text-arsenic-1 text-[14px]   outline-0 resize-none
                        focus:ring-transparent focus:border-forest-green placeholder:text-light-silver
                        md:text-[12px] md:py-[10px] md:px-[16px]"
                            required></textarea>
                    </div>
                    <div>
                        <div class="font-poppins-semibold text-[18px] mb-[10px] lg:text-base md:text-[14px]">Pilih
                            Metode
                            Pengiriman :</div>
                        <div class="overflow-x-auto py-3">
                            <div class="flex flex-col gap-y-[12px] option-ongkir gap-x-[14px]  w-full min-w-max">
                                <div class="text-[14px] text-philippine-gray ">Tidak ada data</div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div>

            <div
                class="shadow-custom-8 p-[46px] rounded-[20px] w-[523px]
            lg:w-full lg:p-[30px] md:p-[24px]">
                <div class="text-arsenic-1 font-poppins-semibold text-[32px] mb-6 lg:text-[24px] md:text-[19px]">Detail
                    Barang</div>

                <div
                    class="flex flex-col gap-y-[30px] font-poppins-regular mt-[50px] mb-[55px] text-[20px]  lg:text-[18px] md:text-[14px] md:gap-y-[20px]">
                    <div class="flex justify-between border-b border-light-silver pb-1">
                        <div class="text-philippine-gray ">Harga</div>
                        <div class="text-arsenic-1 sub-count-price">0</div>
                    </div>
                    <div class="flex justify-between border-b border-light-silver pb-1">
                        <div class="text-philippine-gray ">Berat</div>
                        <div class="text-arsenic-1 count-weight">0</div>
                    </div>
                    <div class="flex justify-between border-b border-light-silver pb-1">
                        <div class="text-philippine-gray ">Jumlah Barang</div>
                        <div class="text-arsenic-1 count-qty">0</div>
                    </div>
                    <div class="flex justify-between border-b border-light-silver pb-1">
                        <div class="text-philippine-gray ">Harga Ongkir</div>
                        <div class="text-arsenic-1 ongkir-price">0</div>
                    </div>
                    <div class="flex justify-between border-b border-light-silver pb-1 font-poppins-semibold">
                        <div class="text-philippine-gray ">Total</div>
                        <div class="text-arsenic-1 count-price">0</div>
                    </div>
                </div>
                <div class="flex flex-col gap-y-[23px] font-poppins-semibold group-submit-data">
                    <button form="form_submit"
                        class="border border-forest-green w-full py-[17px] text-[15px] rounded-[8px] bg-forest-green text-white submit-data flex justify-center gap-x-[10px] items-center self-center transition ease-in-out duration-150
                        md:py-[14px] lg:text-[13px] md:text-[12px]">
                        <svg class="animate-spin  h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Mulai
                        Pesanan</button>
                </div>
            </div>
        </div>
    </div>
</section>
