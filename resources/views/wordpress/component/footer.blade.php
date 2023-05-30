<footer class="bg-outer-space w-full py-16.75 font-inter-regular">
    <div class=" w-full max-w-[1107px] grid grid-cols-5 mx-auto">
        <div>
            <div class="mb-4">
                <img src="{{ asset('/wordpress/img/logo-footer.png') }}" alt="">
            </div>
            <div class="w-42.5 text-sm text-cultured">
                © 2022, Varash Semesta Investama
            </div>
        </div>
        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">LINKS</div>
            <ul class="text-bright-gray flex flex-col gap-y-1.75 text-[13px]">
                <li><a href="">Anava</a></li>
                <li><a href="">Rosevara</a></li>
                <li><a href="">Sirah Bali Info</a></li>
                <li><a href="">Varash Indonesia Jaya</a></li>
            </ul>
        </div>
        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">MENU</div>
            <ul class="text-bright-gray flex flex-col gap-y-1.75 text-[13px]">
                <li><a href="">Home</a></li>
                <li><a href="">Produk</a></li>
                <li><a href="">Testimoni</a></li>
                <li><a href="">Tentang</a></li>
            </ul>
        </div>
        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">SOSIAL MEDIA</div>
            <ul class="text-bright-gray flex flex-col gap-y-1.75 text-[13px]">
                <li><a href="{{ $sosmed->twitter }}">Twitter</a></li>
                <li><a href="{{ $sosmed->instagram }}">Instagram</a></li>
            </ul>
        </div>

        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">KONTAK</div>
            <div class="text-[13px] text-bright-gray mb-5">
                <div class="mb-1.75">{{ $profile->email }}</div>
                <div>{{ $profile->phone_cs_1 }}</div>
            </div>
            <div class="text-[13px] text-bright-gray w-49">
                {{ $profile->store_address }}
            </div>
        </div>
    </div>
</footer>
