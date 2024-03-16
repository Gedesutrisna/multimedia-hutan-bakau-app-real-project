@extends('layouts.main')
@section('container')

    <!-- Main content -->


        <div class="content-main p-[32px] lg:ms-10 xl:ms-4 2xl:ms-0 bg-body {{ $quizzes->count() < 4 ? 'h-[100vh]' : '' }}">
            <div class="sm:flex sm:justify-between block items-end">
                <div class="flex gap-3">
                    <a href="/"><img src="/asset/back logo.svg" alt=""></a>
                    <h1 class="text-[#141414] font-Urbanist text-[28px] font-semibold">Quizzes</h1>
                </div>
            </div>

            <div class="overflow-x-auto">
                <ul
                    class="grid grid-cols-10 bg-[#E4E5E9] rounded-[8px] p-[16px] mt-9 text-[14px] font-Urbanist font-medium text-[#78797A] w-[1000px] xl:w-full place-items-start"
                >
                    <li class="">#</li>
                    <li class="">Duration</li>
                    <li class="col-span-2">Name</li>
                    <li class="col-span-4">Description</li>
                    <li class="">Question</li>
                    <li class=""></li>
                </ul>
                @foreach ($quizzes as $quiz)
                <ul
                class="grid grid-cols-10 bg-transparent place-items-start py-[20px] px-[14px] text-[15px] font-Urbanist font-medium text-[#08112F] border-b border-[#D9DADE text-[#08112F] font-Urbanist text-[15px] font-medium w-[1000px] xl:w-full place-items-start"
                >
                <li>{{ ($quizzes->currentPage() - 1) * $quizzes->perPage() + $loop->index + 1 }}</li>
                <li class="">{{ $quiz->duration }} minute</li>
                <li class="col-span-2 whitespace-normal">{{ $quiz->name }}</li>
                <li class="col-span-4">{!! Str::limit($quiz->description, 90) !!}</li>
                <li class="">{{ $quiz->questions->count() }} Question</li>
                <div class="flex items-center gap-[4px]">
                    <a href="/quizzes/{{ $quiz->slug }}">
                        <button
                            class="py-[6px] px-[3px] bg-[#E1E7F7] rounded-[5px] w-[32px] h-[32px] flex justify-center items-center"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <g clip-path="url(#clip0_1_380)">
                                    <path
                                        d="M0.00012207 7.78109C0.212778 6.95097 0.74056 6.29931 1.24137 5.6395C2.12628 4.47366 3.19322 3.50834 4.50068 2.82897C5.74762 2.18103 7.07434 1.89766 8.47762 1.98525C10.5821 2.11656 12.304 3.05512 13.7759 4.51181C14.5611 5.28887 15.2176 6.16656 15.7539 7.13109C15.8653 7.33144 15.9196 7.56362 16.0002 7.78112C16.0002 7.92697 16.0002 8.07278 16.0002 8.21862C15.825 8.97666 15.3427 9.56675 14.9143 10.1839C14.7144 10.472 14.3294 10.5169 14.054 10.3173C13.7779 10.1172 13.7148 9.75144 13.9048 9.45662C14.1584 9.06322 14.4122 8.66997 14.6641 8.27553C14.7713 8.10766 14.78 7.93334 14.6797 7.75862C13.9053 6.40959 12.939 5.23069 11.6378 4.35347C10.454 3.55537 9.14878 3.16141 7.71787 3.22531C6.30437 3.28844 5.05572 3.80041 3.94322 4.65969C2.85137 5.50303 2.00947 6.55978 1.32553 7.74953C1.23609 7.90512 1.2195 8.06566 1.30915 8.22512C2.15787 9.73437 3.23084 11.0487 4.76481 11.8967C7.13215 13.2055 9.46431 13.0716 11.728 11.601C11.8651 11.5118 12.0127 11.4158 12.1681 11.3827C12.4537 11.3219 12.7263 11.4948 12.8331 11.7585C12.9427 12.0291 12.8588 12.3243 12.6086 12.5059C11.896 13.023 11.1269 13.4367 10.2804 13.683C7.68209 14.4388 5.30915 13.9606 3.16578 12.3297C1.92472 11.3854 0.971841 10.1891 0.220122 8.83041C0.116528 8.64316 0.0719971 8.42331 0.00012207 8.21859C0.00012207 8.07275 0.00012207 7.92694 0.00012207 7.78109Z"
                                        fill="#547DE2"
                                    />
                                    <path
                                        d="M8.00598 4.3125C10.0359 4.31416 11.6897 5.97288 11.6871 8.00463C11.6845 10.0346 10.025 11.6891 7.99429 11.6862C5.96426 11.6833 4.31117 10.0247 4.31336 7.99294C4.31554 5.96275 5.97292 4.31084 8.00598 4.3125ZM5.5632 7.99266C5.56104 9.33472 6.65145 10.4327 7.99004 10.4363C9.33223 10.4399 10.4325 9.35031 10.4372 8.01275C10.442 6.66231 9.34992 5.56328 8.00233 5.56247C6.66023 5.56169 5.56536 6.65253 5.5632 7.99266Z"
                                        fill="#547DE2"
                                    />
                                    <path
                                        d="M8.00165 9.24874C7.4749 9.24928 6.99381 8.90846 6.81996 8.41162C6.64699 7.91725 6.8044 7.36031 7.20984 7.03118C7.32752 6.93565 7.45071 6.86684 7.60934 6.93034C7.77293 6.99584 7.8179 7.12924 7.83421 7.28974C7.8854 7.79331 8.20712 8.11553 8.70849 8.16512C8.86902 8.181 9.00259 8.22512 9.06846 8.38878C9.13227 8.54728 9.06418 8.67028 8.96859 8.78837C8.73612 9.07543 8.37409 9.24837 8.00165 9.24874Z"
                                        fill="#547DE2"
                                    />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1_380">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </a>
                </div>
            </ul>
                @endforeach
            </div>
            <div class="mt-3">
                {{ $quizzes->links() }}
            </div>
        </div>


@endsection