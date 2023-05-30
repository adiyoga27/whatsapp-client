<section class="w-full mx-auto max-w-[1107px] pt-28">
    <div class="mb-20 lg:px-8">
        <div class="font-poppins-bold text-[32px]">Testimonial</div>
        <div class="font-poppins-regular text-[15px] text-gray-6 ">{{ count($testimonial) }} person who left a review
        </div>
    </div>
    <div class="grid grid-cols-3 gap-10
    md:grid-cols-1 lg:px-8">
        @for ($i = 0; $i < count($testimonial); $i++)
            <div
                class="w-full max-w-[342px] rounded-[20px] py-7 px-9 relative text-center testimoni-modal cursor-pointer shadow-custom-5 
    lg:self-center">

                <div class="self-center mt-8 mb-6">
                    <div class="w-15.5 h-15.5 mr-auto">
                        <img src="{{ asset('storage/' . $testimonial[$i]->photo) }}" alt="avatar"
                            class="w-full h-full object-cover rounded-full">
                    </div>
                    <div class="text-apple text-left text-base font-kanit-semibold  title">
                        {{ $testimonial[$i]->name }}
                    </div>
                </div>
                <div class="mb-5 ">
                    <svg width="13" height="10" viewBox="0 0 13 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.10289 1.4325C2.01455 0.481875 3.39407 0 5.20245 0H5.85225V1.76187L5.32981 1.8625C4.43959 2.03375 3.82034 2.37062 3.48894 2.865C3.31602 3.13133 3.21796 3.43628 3.20433 3.75H5.20245C5.37479 3.75 5.54007 3.81585 5.66193 3.93306C5.78379 4.05027 5.85225 4.20924 5.85225 4.375V8.75C5.85225 9.43938 5.26938 10 4.55266 10H0.653881C0.481545 10 0.316267 9.93415 0.194407 9.81694C0.0725462 9.69973 0.00408581 9.54076 0.00408581 9.375V6.25L0.00603521 4.42563C0.000187046 4.35625 -0.123274 2.7125 1.10289 1.4325ZM11.7004 10H7.80163C7.6293 10 7.46402 9.93415 7.34216 9.81694C7.2203 9.69973 7.15184 9.54076 7.15184 9.375V6.25L7.15379 4.42563C7.14794 4.35625 7.02448 2.7125 8.25064 1.4325C9.1623 0.481875 10.5418 0 12.3502 0H13V1.76187L12.4776 1.8625C11.5873 2.03375 10.9681 2.37062 10.6367 2.865C10.4638 3.13133 10.3657 3.43628 10.3521 3.75H12.3502C12.5225 3.75 12.6878 3.81585 12.8097 3.93306C12.9315 4.05027 13 4.20924 13 4.375V8.75C13 9.43938 12.4171 10 11.7004 10Z"
                            fill="#55B33F" />
                    </svg>
                </div>
                <div>
                    <div
                        class="font-poppins-regular text-spanish-gray-1 text-[13px] mb-3 h-25 line-clamp-5 h-[95px] des">
                        {!! $testimonial[$i]->description !!}
                    </div>
                </div>
                <div class="mt-5 text-right">
                    <svg class="ml-auto" width="13" height="10" viewBox="0 0 13 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.8971 1.4325C10.9854 0.481875 9.60593 0 7.79755 0H7.14775V1.76187L7.67019 1.8625C8.56041 2.03375 9.17966 2.37062 9.51106 2.865C9.68398 3.13133 9.78204 3.43628 9.79567 3.75H7.79755C7.62521 3.75 7.45993 3.81585 7.33807 3.93306C7.21621 4.05027 7.14775 4.20924 7.14775 4.375V8.75C7.14775 9.43938 7.73062 10 8.44734 10H12.3461C12.5185 10 12.6837 9.93415 12.8056 9.81694C12.9275 9.69973 12.9959 9.54076 12.9959 9.375V6.25L12.994 4.42563C12.9998 4.35625 13.1233 2.7125 11.8971 1.4325ZM1.29959 10H5.19837C5.3707 10 5.53598 9.93415 5.65784 9.81694C5.7797 9.69973 5.84816 9.54076 5.84816 9.375V6.25L5.84621 4.42563C5.85206 4.35625 5.97552 2.7125 4.74936 1.4325C3.8377 0.481875 2.45818 0 0.649796 0H0V1.76187L0.522437 1.8625C1.41266 2.03375 2.03191 2.37062 2.36331 2.865C2.53622 3.13133 2.63429 3.43628 2.64792 3.75H0.649796C0.47746 3.75 0.312181 3.81585 0.190321 3.93306C0.0684605 4.05027 0 4.20924 0 4.375V8.75C0 9.43938 0.582867 10 1.29959 10Z"
                            fill="#55B33F" />
                    </svg>

                </div>
            </div>
        @endfor
    </div>

    <div class="font-inter-regular mt-10">
        <div class="flex items-center justify-center w-full py-10   lg:justify-between ">

            {{ $testimonial->links('admin.pagination') }}
        </div>
    </div>
</section>
