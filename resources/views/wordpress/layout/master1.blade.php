<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <link rel="shortcut icon" href="{{ asset('storage/' . $profile->logo) }}">
    @vite('resources/sass/wordpress.scss')
</head>

<body class="">
    <header class="fixed top-0 w-full bg-gainsboro z-50">
        <div
            class=" h-32 relative mx-auto max-w-6.9xl w-full  flex justify-between
        xl:max-w-4xl lg:px-6 lg:h-20">
            <div class="flex gap-x-9
            lg:gap-x-6 md:gap-x-4">
                <div class="self-center w-full">
                    <a href="{{ $sosmed->instagram }}">
                    <svg class="lg:w-6 md:w-3.5" width="29" height="28" viewBox="0 0 29 28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.2881 8.93635C11.5957 8.93635 9.41312 11.119 9.41312 13.8113C9.41312 16.5037 11.5957 18.6863 14.2881 18.6863C16.9805 18.6863 19.1631 16.5037 19.1631 13.8113C19.1631 11.119 16.9805 8.93635 14.2881 8.93635Z"
                            fill="#47888E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.44242 0.43355C11.6146 -0.144517 16.9617 -0.144517 22.1338 0.43355C24.9814 0.751811 27.2782 2.99548 27.6125 5.85306C28.2309 11.1406 28.2309 16.4821 27.6125 21.7696C27.2782 24.6272 24.9814 26.8709 22.1338 27.1891C16.9617 27.7672 11.6146 27.7672 6.44242 27.1891C3.59483 26.8709 1.29804 24.6272 0.963816 21.7696C0.345395 16.4821 0.345395 11.1406 0.963816 5.85306C1.29804 2.99548 3.59483 0.751811 6.44242 0.43355ZM21.7881 4.81135C20.9597 4.81135 20.2881 5.48292 20.2881 6.31135C20.2881 7.13978 20.9597 7.81135 21.7881 7.81135C22.6165 7.81135 23.2881 7.13978 23.2881 6.31135C23.2881 5.48292 22.6165 4.81135 21.7881 4.81135ZM7.16312 13.8113C7.16312 9.87632 10.3531 6.68635 14.2881 6.68635C18.2231 6.68635 21.4131 9.87632 21.4131 13.8113C21.4131 17.7464 18.2231 20.9363 14.2881 20.9363C10.3531 20.9363 7.16312 17.7464 7.16312 13.8113Z"
                            fill="#47888E" />
                    </svg>
                </a>
                </div>
                <div class="self-center w-full ">
                    <a href="{{ $sosmed->facebook }}">
                        <svg class="lg:w-6 md:w-2" width="16" height="28" viewBox="0 0 16 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.3 0.3125C9.46006 0.3125 7.69548 1.04341 6.39445 2.34445C5.09341 3.64548 4.3625 5.41006 4.3625 7.25V11.1125H0.65C0.463604 11.1125 0.3125 11.2636 0.3125 11.45V16.55C0.3125 16.7364 0.463604 16.8875 0.65 16.8875H4.3625V27.35C4.3625 27.5364 4.5136 27.6875 4.7 27.6875H9.8C9.98639 27.6875 10.1375 27.5364 10.1375 27.35V16.8875H13.8829C14.0378 16.8875 14.1727 16.7821 14.2103 16.6319L15.4853 11.5319C15.5386 11.3188 15.3774 11.1125 15.1579 11.1125H10.1375V7.25C10.1375 6.94169 10.26 6.646 10.478 6.42799C10.696 6.20998 10.9917 6.0875 11.3 6.0875H15.2C15.3864 6.0875 15.5375 5.9364 15.5375 5.75V0.65C15.5375 0.463604 15.3864 0.3125 15.2 0.3125H11.3Z"
                                fill="#47888E" />
                        </svg>
                    </a>
                </div>
                <div class="self-center w-full">
                    <a href="{{ $sosmed->instagram }}">
                        <svg class="lg:w-7 md:w-4" width="32" height="23" viewBox="0 0 32 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.48351 0.793588C13.487 0.402137 18.5134 0.402137 23.517 0.793588L26.878 1.05654C28.7501 1.20301 30.2816 2.6061 30.5911 4.45825C31.3654 9.0925 31.3654 13.8231 30.5911 18.4574C30.2816 20.3095 28.7501 21.7126 26.878 21.8591L23.5169 22.122C18.5134 22.5135 13.487 22.5135 8.48351 22.122L5.12246 21.8591C3.25034 21.7126 1.71881 20.3095 1.40935 18.4574C0.635036 13.8231 0.635036 9.0925 1.40935 4.45825C1.71881 2.6061 3.25034 1.20301 5.12246 1.05654L8.48351 0.793588ZM13.0002 15.163V7.75259C13.0002 7.40281 13.3818 7.18676 13.6817 7.36672L19.8571 11.0719C20.1484 11.2467 20.1484 11.6689 19.8571 11.8437L13.6817 15.5489C13.3818 15.7289 13.0002 15.5128 13.0002 15.163Z"
                                fill="#47888E" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class=" absolute left-2/4  top-2/4 custom-image translate-middle">
                <div class="w-32 lg:w-28 md:w-14">
                    <img class="w-auto h-auto object-contain" src="{{ asset('storage/'. $profile->logo) }}"
                        alt="logo">
                </div>
            </div>
            <div class="flex gap-x-9
            lg:gap-x-6 md:gap-x-5">
                <div class="self-center">
                    <svg class="lg:w-6 md:w-4" width="36" height="36" viewBox="0 0 36 36" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35.5602 33.4406L26.6067 24.4871C29.0466 21.503 30.2462 17.6952 29.9574 13.8514C29.6686 10.0076 27.9135 6.42186 25.0551 3.83584C22.1966 1.24983 18.4536 -0.1386 14.6001 -0.0422524C10.7467 0.0540953 7.07773 1.62785 4.35209 4.35348C1.62646 7.07912 0.0527068 10.7481 -0.043641 14.6015C-0.139989 18.455 1.24844 22.198 3.83445 25.0564C6.42047 27.9149 10.0062 29.67 13.85 29.9588C17.6938 30.2476 21.5016 29.048 24.4857 26.6081L33.4392 35.5616C33.7221 35.8348 34.101 35.986 34.4943 35.9826C34.8876 35.9792 35.2638 35.8214 35.5419 35.5433C35.82 35.2652 35.9778 34.889 35.9812 34.4957C35.9846 34.1024 35.8334 33.7235 35.5602 33.4406ZM14.9997 27.0011C12.6263 27.0011 10.3062 26.2973 8.33283 24.9787C6.35944 23.6601 4.82137 21.786 3.91312 19.5933C3.00487 17.4005 2.76723 14.9878 3.23025 12.66C3.69327 10.3322 4.83616 8.19401 6.51439 6.51578C8.19262 4.83755 10.3308 3.69466 12.6586 3.23164C14.9864 2.76862 17.3992 3.00626 19.5919 3.91451C21.7846 4.82276 23.6587 6.36083 24.9773 8.33422C26.2959 10.3076 26.9997 12.6277 26.9997 15.0011C26.9961 18.1826 25.7307 21.2327 23.481 23.4824C21.2313 25.7321 18.1812 26.9975 14.9997 27.0011Z"
                            fill="#47888E" />
                    </svg>
                </div>
                <div class="self-center side-data cursor-pointer">
                    <svg class="lg:w-6 md:w-4" width="36" height="36" viewBox="0 0 36 36" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_24_1448)">
                            <path
                                d="M34.5 16.4995H1.5C0.671573 16.4995 0 17.1711 0 17.9996C0 18.828 0.671573 19.4996 1.5 19.4996H34.5C35.3284 19.4996 36 18.828 36 17.9996C36 17.1711 35.3284 16.4995 34.5 16.4995Z"
                                fill="#47888E" />
                            <path
                                d="M34.5 6.00046H1.5C0.671573 6.00046 0 6.67203 0 7.50045C0 8.32888 0.671573 9.00045 1.5 9.00045H34.5C35.3284 9.00045 36 8.32888 36 7.50045C36 6.67203 35.3284 6.00046 34.5 6.00046Z"
                                fill="#47888E" />
                            <path
                                d="M34.5 27H1.5C0.671573 27 0 27.6716 0 28.5C0 29.3284 0.671573 30 1.5 30H34.5C35.3284 30 36 29.3284 36 28.5C36 27.6716 35.3284 27 34.5 27Z"
                                fill="#47888E" />
                        </g>
                        <defs>
                            <clipPath id="clip0_24_1448">
                                <rect width="36" height="36" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
            </div>
        </div>
        <div
            class="fixed top-0 left-0 w-full h-full min-h-screen min-w-screen bg-white-1 z-50 side-bar side-swipe animated  fadeOut faster">
            <div class="absolute w-screen h-screen z-10"></div>
            <div
                class="min-h-screed h-full bg-white relative animated side-content
            w-75,75 px-4 py-5 lg:px-3 lg:py-4 z-20">
                <div class="absolute right-[-40px] side-data top-7 cursor-pointer">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L21 21M2 21L21 2" stroke="#0C0C0C" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </div>
                <div>
                    <div class="w-16 lg:w-14 mx-auto">
                        <img class="w-full h-full object-contain"
                            src="{{ asset('storage/' . $profile->logo) }}" alt="logo">
                    </div>
                </div>
                <div class="mt-10 lg:mt-8">
                    <ul class="
                   text-lg  lg:text-base flex flex-col gap-y-3">
                        <li class="hover:text-jelly-bean-blue hover:font-metro-bold cursor-pointer">Home</li>
                        <li class="hover:text-jelly-bean-blue hover:font-metro-bold cursor-pointer">About Us</li>
                        <li class="hover:text-jelly-bean-blue hover:font-metro-bold cursor-pointer">Product</li>
                        <li class="hover:text-jelly-bean-blue hover:font-metro-bold cursor-pointer">Contact</li>
                        <li class="hover:text-jelly-bean-blue hover:font-metro-bold cursor-pointer">Testimonial</li>
                        <li class="hover:text-jelly-bean-blue hover:font-metro-bold cursor-pointer">Article</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="bg-jelly-bean-blue">
        <div
            class="max-w-4.3xl w-full mx-auto flex justify-between font-bold text-2xl text-white py-5
        xl:px-2 xl:text-lg lg:text-base sm:text-0.5xs">
            <div class="flex-shrink self-center">VARASH NATURAL OIL</div>
            <div class="w-full max-w-0.2xs self-center flex-grow
            sm:max-w-0.151xs sm:max-w-0.111xs">
                <hr class="h-0.5 mt-px" />
            </div>
            <div lang="flex-shrink self-center">DON’T LET YOUR SPIRIT DOWN</div>
        </div>
    </footer>
    <script src="/wordpress/assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            Animtaion()
        });

        function Animtaion() {
            const targetall = document.querySelectorAll('.animated-show');

            function handleIntersection(entries) {
                entries.map((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible')
                    }
                });
            }
            const observer = new IntersectionObserver(handleIntersection);
            [].forEach.call(targetall, function(div) {
                observer.observe(div);
            });
        }
        $('.side-data').click(() => {
            const show = $('.side-bar').hasClass('fadeIn');
            if (show) {
                $('.side-bar').removeClass('fadeIn');
                $('.side-bar').addClass('fadeOut');

                document.body.style.overflow = "auto";
                document.body.style.userSelect = "auto";
                setTimeout(() => $('.side-bar').css('display', 'none'), 500);
            } else {
                $('.side-bar').removeClass('fadeOut');
                $('.side-bar').addClass('fadeIn');
                $('.side-bar').css('display', 'block');
                document.body.style.overflow = "hidden";
                document.body.style.userSelect = "none";
            }
        })
    </script>
</body>

</html>
