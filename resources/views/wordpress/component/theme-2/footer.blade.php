<footer class="bg-outer-space w-full py-16.75 font-inter-regular">
    <div class=" w-full max-w-[1107px] grid grid-cols-5 mx-auto
    lg:grid-cols-1 lg:gap-y-10 lg:px-8">
        <div>
            <div class="mb-4">
                <img src="{{ asset('/wordpress/img/logo-footer.png') }}" alt="">
            </div>
            <div class="w-42.5 text-sm text-cultured">
                {{-- © 2022, Varash Semesta Investama --}}
                © 2022, {{ $profile->web_name }}
            </div>
        </div>
        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">MENU</div>
            <ul class="text-bright-gray flex flex-col gap-y-1.75 text-[13px]">
                <li><a href="/">Home</a></li>
                <li><a href="/product">Produk</a></li>
                <li><a href="/article">Artikel</a></li>
                <li><a href="/testimonial">Testimoni</a></li>
            </ul>
        </div>
        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">SOSIAL MEDIA</div>
            <ul class="text-bright-gray flex flex-col gap-y-1.75 text-[13px]">
                <li><a href="https://www.instagram.com/{{ $sosmed->instagram }}" target="_blank">Instagram</a></li>
                <li><a href="https://twitter.com/{{ $sosmed->twitter }}" target="_blank">Twitter</a></li>
                <li><a href="https://www.facebook.com/{{ $sosmed->facebook }}" target="_blank">Facebook</a></li>
            </ul>
        </div>

        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">KONTAK</div>
            <div class="text-[13px] text-bright-gray mb-5">
                <div class="mb-1.75">{{ $profile->email }}</div>
                <div>{{ $profile->phone_cs_1 }}</div>
            </div>
            <div class="text-[13px] text-bright-gray w-49">
                {{-- Jl. Lorem Ipsum Dolor Sit Amet, Denpasar, Bali, 80011 --}}
                {{ $profile->store_address }}
            </div>
        </div>
    </div>
</footer>
