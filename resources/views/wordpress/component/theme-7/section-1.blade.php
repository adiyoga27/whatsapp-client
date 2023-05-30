<section class="bg-tea-green pt-44 font-poppins-regular rounded-b-[100px]
lg:rounded-b-[20px] lg:pt-32">
    <div class="max-w-[1107px] mx-auto flex  gap-x-10 flex-1
    lg:px-8 lg:flex-col">
        <div class="flex-1 max-w-[560px] pb-40
        lg:pb-10 lg:max-w-full">
            <div class="text-base text-arsenic
            lg:text-[13px]">Selamat Datang</div>
            <div
                class="text-[50px] leading-[68px] text-arsenic font-poppins-semibold mt-2.5 mb-1
            lg:text-[22px] lg:leading-[30px]">
                {{ $profile->web_name }}
            </div>
            <div class="font-poppins-regular text-spanish-gray-1 text-[20px]
            lg:text-[13px]">
                {{ $profile->sub_web_name }}
            </div>
        </div>
        <div class="self-end
        lg:self-center lg:pb-0">
            <div
                class="w-full rounded-t-[50px] w-[500px] h-[457px]   bg-apple pt-10 shadow-custom-6
            lg:w-[300px] lg:h-[400px] lg:pt-6">
                <div
                    class="w-[420px] rounded-t-[50px] bg-tea-green mx-auto h-[417px] relative flex
                lg:w-[250px] lg:h-[376px]">
                    <img class="object-contain w-[300px] mx-auto h-[300px] self-center
                    lg:w-[213.36px] lg:h-[213.36px]"
                        src="{{ asset('storage/' . $profile->section1_img) }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>
