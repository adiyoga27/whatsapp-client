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
        <div>
            <div class="font-inter-medium text-[13px] text-white mb-3.25">MENU</div>
            <ul class="text-bright-gray flex flex-col gap-y-1.75 text-[13px]">
                <li><a href="/  ">Home</a></li>
                <li><a href="/product">Produk</a></li>
                <li><a href="/article">Artikel</a></li>
                <li><a href="/product">Testimoni</a></li>
            </ul>
        </div>
        <div class="flex gap-x-[20px] self-center">
            <a href="https://www.instagram.com/{{ $sosmed->instagram }}" target="_blank">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21.0015 12.8017C23.6703 12.8017 23.9867 12.8105 25.0413 12.8603C26.0168 12.9042 26.5471 13.0683 26.8986 13.2059C27.3644 13.3876 27.6984 13.6044 28.047 13.953C28.3956 14.3016 28.6124 14.6356 28.7941 15.1014C28.9317 15.4529 29.0929 15.9832 29.1397 16.9587C29.1866 18.0133 29.1983 18.3297 29.1983 20.9985C29.1983 23.6673 29.1895 23.9837 29.1397 25.0384C29.0958 26.0139 28.9317 26.5442 28.7941 26.8957C28.6124 27.3615 28.3956 27.6955 28.047 28.0441C27.6984 28.3927 27.3644 28.6095 26.8986 28.7911C26.5471 28.9288 26.0168 29.0899 25.0413 29.1368C23.9867 29.1837 23.6703 29.1954 21.0015 29.1954C18.3326 29.1954 18.0163 29.1866 16.9616 29.1368C15.9861 29.0929 15.4558 28.9288 15.1043 28.7911C14.6385 28.6095 14.3045 28.3927 13.9559 28.0441C13.6073 27.6955 13.3905 27.3615 13.2089 26.8957C13.0712 26.5442 12.9101 26.0139 12.8632 25.0384C12.8163 23.9837 12.8046 23.6673 12.8046 20.9985C12.8046 18.3297 12.8134 18.0133 12.8632 16.9587C12.9071 15.9832 13.0712 15.4529 13.2089 15.1014C13.3905 14.6356 13.6073 14.3016 13.9559 13.953C14.3045 13.6044 14.6385 13.3876 15.1043 13.2059C15.4558 13.0683 15.9861 12.9071 16.9616 12.8603C18.0163 12.8105 18.3326 12.8017 21.0015 12.8017ZM21.0015 11C18.2858 11 17.9459 11.0117 16.8796 11.0615C15.8162 11.1113 15.0896 11.2783 14.451 11.5273C13.7948 11.7793 13.2352 12.122 12.6816 12.6786C12.1249 13.2352 11.7851 13.7919 11.5273 14.451C11.2812 15.0867 11.1113 15.8132 11.0615 16.8796C11.0117 17.946 11 18.2858 11 21.0015C11 23.7172 11.0117 24.057 11.0615 25.1233C11.1113 26.1868 11.2783 26.9133 11.5273 27.5519C11.7822 28.2052 12.1249 28.7648 12.6816 29.3184C13.2382 29.8751 13.7948 30.2149 14.4539 30.4727C15.0896 30.7188 15.8162 30.8887 16.8825 30.9385C17.9489 30.9883 18.2887 31 21.0044 31C23.7201 31 24.0599 30.9883 25.1263 30.9385C26.1897 30.8887 26.9162 30.7217 27.5549 30.4727C28.2081 30.2178 28.7677 29.8751 29.3214 29.3184C29.878 28.7618 30.2178 28.2052 30.4756 27.5461C30.7217 26.9104 30.8916 26.1838 30.9414 25.1175C30.9912 24.0511 31.0029 23.7113 31.0029 20.9956C31.0029 18.2799 30.9912 17.9401 30.9414 16.8737C30.8916 15.8103 30.7246 15.0838 30.4756 14.4451C30.2207 13.7919 29.878 13.2323 29.3214 12.6786C28.7648 12.122 28.2081 11.7822 27.549 11.5244C26.9133 11.2783 26.1868 11.1084 25.1204 11.0586C24.057 11.0117 23.7172 11 21.0015 11Z"
                        fill="white" />
                    <path
                        d="M21.0012 15.8633C18.1654 15.8633 15.8657 18.163 15.8657 20.9988C15.8657 23.8346 18.1654 26.1343 21.0012 26.1343C23.837 26.1343 26.1367 23.8346 26.1367 20.9988C26.1367 18.163 23.837 15.8633 21.0012 15.8633ZM21.0012 24.3326C19.1615 24.3326 17.6674 22.8415 17.6674 20.9988C17.6674 19.1561 19.1615 17.665 21.0012 17.665C22.841 17.665 24.335 19.1561 24.335 20.9988C24.335 22.8415 22.841 24.3326 21.0012 24.3326Z"
                        fill="white" />
                    <path
                        d="M26.3393 16.8622C27.0027 16.8622 27.5404 16.3244 27.5404 15.6611C27.5404 14.9977 27.0027 14.46 26.3393 14.46C25.6759 14.46 25.1382 14.9977 25.1382 15.6611C25.1382 16.3244 25.6759 16.8622 26.3393 16.8622Z"
                        fill="white" />
                    <rect x="0.5" y="0.5" width="41" height="41" rx="19.5" stroke="white" />
                </svg>
            </a>
            <a href="https://www.twitter.com/{{ $sosmed->twitter }}" target="_blank">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.2836 30C25.8316 30 29.9641 23.4597 29.9641 17.7864C29.9641 17.6023 29.9641 17.4148 29.9513 17.2307C30.7548 16.6216 31.4494 15.8718 32 15.0082C31.251 15.3563 30.4571 15.5839 29.644 15.6844C30.5019 15.1488 31.1421 14.3053 31.4494 13.3112C30.6428 13.81 29.7625 14.1648 28.8438 14.3522C27.2881 12.6251 24.6889 12.5414 23.0371 14.1648C21.9712 15.2124 21.5198 16.7755 21.8496 18.265C18.5493 18.0909 15.4731 16.4609 13.3892 13.7798C12.3009 15.7413 12.8547 18.2483 14.6601 19.5101C14.007 19.49 13.3668 19.3059 12.7971 18.9746C12.7971 18.9913 12.7971 19.0114 12.7971 19.0281C12.7971 21.0699 14.1735 22.8305 16.0909 23.2355C15.4859 23.4062 14.8521 23.4329 14.2375 23.3091C14.7753 25.0563 16.315 26.2546 18.0723 26.2914C16.6191 27.4863 14.8233 28.1357 12.9763 28.1323C12.6498 28.1323 12.3233 28.1122 12 28.0687C13.8694 29.3306 16.0557 30 18.2836 29.9967"
                        fill="white" />
                    <rect x="0.5" y="0.5" width="41" height="41" rx="19.5" stroke="white" />
                </svg>
            </a>
            <a href="https://www.facebook.com/{{ $sosmed->facebook }}" target="_blank">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M29.1744 27.0703L30.1055 21H24.2812V17.0609C24.2812 15.4001 25.095 13.7812 27.7036 13.7812H30.3516V8.61328C30.3516 8.61328 27.9485 8.20312 25.6508 8.20312C20.854 8.20312 17.7188 11.1103 17.7188 16.3734V21H12.3867V27.0703H17.7188V41.7449C18.788 41.9126 19.8836 42 21 42C22.1164 42 23.212 41.9126 24.2812 41.7449V27.0703H29.1744Z"
                        fill="white" />
                    <rect x="0.5" y="0.5" width="41" height="41" rx="19.5" stroke="white" />
                </svg>
            </a>
        </div>

    </div>
</footer>
