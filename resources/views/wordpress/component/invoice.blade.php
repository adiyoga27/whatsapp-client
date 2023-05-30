<section class="py-32 bg-[#F7F7F7]
md:px-3">
    <div class=" max-w-[907px] bg-white  mx-auto px-8 py-7 rounded-[5px] 
    md:px-3 md:py-4">
        <div class="text-center mb-6">
            <img class="w-[130px] h-[130px]  mx-auto object-contain
                    lg:w-[90px] lg:h-[90px]"
                src="{{ asset('/wordpress/img/logo.png') }}" alt="logo">

        </div>
        <hr class="h-[2px]">
        <div class="flex  gap-6 mt-6 mb-8 md:flex-col">
            <div class="flex flex-1 flex-col gap-y-1 max-w-[390px] md:max-w-full">
                <div class="flex gap-x-[20px] text-[14px] border border-forest-green py-2 px-2">
                    <div class="font-poppins-regular ">No Invoice</div>
                    <div class="font-poppins-semibold no-inv ">: -</div>
                </div>
                <div class="flex gap-x-[20px] text-[14px]  border border-forest-green py-2 px-2 flex-1">
                    <div class="font-poppins-regular">Batas Pembayaran</div>
                    <div class="font-poppins-semibold  exp-date">: -</div>
                </div>
            </div>
            <div class="flex self-center flex-1 w-full max-w-[390px] gap-x-5 md:flex-col gap-y-2.5">
                <div class="md:self-center md:text-center">
                    <div class="font-poppins-regular">JUMLAH TAGIHAN</div>
                    <div class="font-poppins-bold text-[26px] tracking-[2px] count-price">Rp 0</div>
                </div>
                <div class="self-center md:w-full">
                    <button
                        class="font-poppins-regular text-[12px] py-[8px] px-6 bg-forest-green text-white rounded-[6px] md:w-full price copy-clipboard">Salin
                        Jumlah</button>
                </div>
            </div>
        </div>
        <div class="mb-6 border border-forest-green font-poppins-regular py-2 px-2">
            <div class="text-[12px] mb-2">Silahkan melakukan pembayaran melalui Transfer Bank. Pastikan anda memasukan
                nominal dan nomor
                Bank yang sama agar otomatis diproses oleh sistem.</div>
            <div class="flex flex-col gap-y-[12px] group-bank">
                <div class="font-poppins-semibold text-[12px] text-center">Tidak ada data</div>
            </div>
        </div>
        <div class="flex gap-6 md:flex-col">
            <div class="flex-1 max-w-[390px] md:max-w-full overflow-y-auto">
                <table class="w-full md:min-w-max border border-forest-green">
                    <thead>
                        <tr class="bg-forest-green text-white font-poppins-semibold text-[14px] ">
                            {{-- <th class="py-2 px-2">Gambar</th> --}}
                            <th class="py-2 px-2">Item</th>
                            <th class="py-2 px-2">Qty</th>
                            <th class="py-2 px-2">Berat</th>
                            <th class="py-2 px-2">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody class="order-data">
                        <tr class="font-poppins-regular text-[12px]">
                            <td class="py-2 px-2 text-center" colspan="4">Tidak ada data</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-forest-green text-white font-poppins-regular text-[12px]">
                            <td colspan="3" class="py-2 px-2">Harga </td>
                            <td class="py-2 px-2 sub-count">Rp 0</td>
                        </tr>
                        <tr class="bg-forest-green text-white font-poppins-regular text-[12px]">
                            <td colspan="3" class="py-2 px-2">Harga Ongkir </td>
                            <td class="py-2 px-2 ongkir">Rp 0</td>
                        </tr>
                        <tr class="bg-forest-green text-white font-poppins-semibold text-[12px]">
                            <td colspan="3" class="py-2 px-2">Total</td>
                            <td class="py-2 px-2 count-price">Rp 0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="flex-1 max-w-[390px] md:max-w-full">
                <div class="font-poppins-bold text-[14px] mb-3 text-forest-green flex gap-x-2 self-center items-center">
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_104_2)">
                            <path
                                d="M0 0.125V1.5H14.1965V11.8125H9.59668C9.26395 10.6309 8.10814 9.75 6.72468 9.75C5.34122 9.75 4.18541 10.6309 3.85268 11.8125H2.98875V8.375H1.49437V13.1875H3.85268C4.18541 14.3691 5.34122 15.25 6.72468 15.25C8.10814 15.25 9.26395 14.3691 9.59668 13.1875H15.8077C16.1404 14.3691 17.2962 15.25 18.6797 15.25C20.0631 15.25 21.2189 14.3691 21.5517 13.1875H23.91V7.58008L23.8633 7.47266L22.3689 3.34766L22.2054 2.875H15.6909V0.125H0ZM0.747186 2.875V4.25H7.47186V2.875H0.747186ZM15.6909 4.25H21.1314L22.4156 7.77344V11.8125H21.5517C21.2189 10.6309 20.0631 9.75 18.6797 9.75C17.2962 9.75 16.1404 10.6309 15.8077 11.8125H15.6909V4.25ZM1.49437 5.625V7H5.97749V5.625H1.49437ZM6.72468 11.125C7.55943 11.125 8.21905 11.7319 8.21905 12.5C8.21905 13.2681 7.55943 13.875 6.72468 13.875C5.88993 13.875 5.23031 13.2681 5.23031 12.5C5.23031 11.7319 5.88993 11.125 6.72468 11.125ZM18.6797 11.125C19.5144 11.125 20.174 11.7319 20.174 12.5C20.174 13.2681 19.5144 13.875 18.6797 13.875C17.8449 13.875 17.1853 13.2681 17.1853 12.5C17.1853 11.7319 17.8449 11.125 18.6797 11.125Z"
                                fill="#5BB06E" />
                        </g>
                        <defs>
                            <clipPath id="clip0_104_2">
                                <rect width="24" height="16" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>


                    Informasi Pengiriman
                </div>
                <ul class="border border-forest-green">
                    <li class="text-[12px] border-b border-forest-green py-3 px-3">
                        <div class="font-poppins-semibold">Nama Pembeli</div>
                        <div class="font-poppins-regular customer-name">-</div>
                    </li>
                    <li class="text-[12px]  border-b border-forest-green py-3 px-3">
                        <div class="font-poppins-semibold">Alamat</div>
                        <div class="font-poppins-regular customer-address">-</div>
                    </li>
                    <li class="text-[12px]  border-b border-forest-green py-3 px-3">
                        <div class="font-poppins-semibold">No. Handphone</div>
                        <div class="font-poppins-regular customer-phone">-</div>
                    </li>
                    <li class="text-[12px]   py-3 px-3">
                        <div class="font-poppins-semibold">Layanan Pengiriman</div>
                        <div class="font-poppins-regular kurir">-</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
