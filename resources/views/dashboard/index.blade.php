@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->


        <div class="content-main p-[32px] lg:ms-10 xl:ms-4 2xl:ms-0">
            <div class="grid 2xl:grid-cols-5 mt-[20px] md:mb-0 lg:mb-[42px] gap-5 xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3">
                <div class="py-[14px] px-[28px] bg-white border-l-[#6E62E5] border-l-[6px] rounded-[6px] flex flex-col">
                    <p class="text-[#858585] font-Urbanist text-[13px] font-medium">Total Blogs</p>
                    <p class="text-[#6E62E5] font-Urbanist text-[26px] font-bold">{{ $blogs->count() }}</p>
                </div>

                <div class="py-[14px] px-[28px] bg-white border-l-[#6E62E5] border-l-[6px] rounded-[6px]">
                    <p class="text-[#858585] font-Urbanist text-[13px] font-medium">Total Quizzes</p>
                    <p class="text-[#6E62E5] font-Urbanist text-[26px] font-bold">{{ $quizzes->count() }}</p>
            </div>

                <div class="py-[14px] px-[28px] bg-white border-l-[#6E62E5] border-l-[6px] rounded-[6px]">
                    <p class="text-[#858585] font-Urbanist text-[13px] font-medium">Total Questions</p>
                    <p class="text-[#6E62E5] font-Urbanist text-[26px] font-bold">{{ $questions->count() }}</p>
                </div>

                <div class="py-[14px] px-[28px] bg-white border-l-[#6E62E5] border-l-[6px] rounded-[6px]">
                    <p class="text-[#858585] font-Urbanist text-[13px] font-medium">Total Answers</p>
                    <p class="text-[#6E62E5] font-Urbanist text-[26px] font-bold">{{ $answers->count() }}</p>
                </div>

                <div class="py-[14px] px-[28px] bg-white border-l-[#6E62E5] border-l-[6px] rounded-[6px]">
                    <p class="text-[#858585] font-Urbanist text-[13px] font-medium">Total Quiz Results</p>
                    <p class="text-[#6E62E5] font-Urbanist text-[26px] font-bold">{{ $quiz_results->count() }}</p>
                </div>
            </div>

            <div class="wrapper-content-2 lg:grid lg:grid-cols-12 mt-[32px] gap-5">
                <div class="banner-chart xl:col-span-7 lg:col-span-7 w-full h-full">
                    <div
                        class="xl:py-[32px] lg:px-[28px] xl:px-[36px] flex flex-col rounded-xl bg-white bg-clip-border"
                    >
                        <div class="mx-4 mt-4 flex flex-col gap-4 rounded-none bg-transparent bg-clip-border text-gray-700">
                            <div>
                                <div class="flex justify-between">
                                    <h6 class="font-Urbanist text-[20px] font-semibold text-[#141414]">Total People Consultation</h6>
                                </div>
                                <hr class="mt-4" />
                            </div>
                        </div>
                        <div class="px-0 pb-0">
                            <div id="bar-chart" class=""></div>
                        </div>
                    </div>
                </div>

                <div class="banner-schedule xl:col-span-5 lg:col-span-5 w-full h-full mt-5 lg:mt-0">
                    <div
                        class="xl:ms-5 lg:ms-0 xl:mt-0 xl:py-[26px] px-[24px] md:py-[28px] lg:py-[25px] py-[25px] rounded-[16px] bg-white h-full"
                    >
                        <p class="text-[#141414] font-Urbanist text-[20px] font-semibold lg:pt-2">Notification</p>
                        @foreach ($quiz_results as $quiz_result)
                            
                        <div class="ps-4 py-4 rounded-l-[8px] rounded-tr-[8px] bg-[#F5F6FB] mt-[18px] relative">
                            <p class="text-[#3D3D3E] font-Urbanist text-[14px] font-medium">
                                {{ $quiz_result->user->name }} User successfully did the quiz {{ $quiz_result->quiz->name }} with score {{ $quiz_result->point }}
                            </p>
                            <div class="flex items-center mt-[14px] lg:space-x-[8px] xl:space-x-[42px]">
                                <p class="text-[#3D3D3E] font-Urbanist text-[12px] font-medium flex items-center">
                                    <img class="pr-2" src="/asset/clock.svg" alt="" />
                                    {{ $quiz_result->created_at->format('h:i:s A') }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            const chartConfig = {
                series: [
                    {
                        name: "data",
                        data: [{{ $quizzes->count() }},{{ $quiz_results->count() }}]
                    }
                ],

                // ... (konfigurasi lainnya tetap sama)

                colors: ["#8C80FF"],
                chart: {
                    type: "bar",
                    height: 250,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },

                plotOptions: {
                    bar: {
                        vertical: true,
                        distributed: true
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "70%",
                        borderRadius: 10
                    }
                },
                xaxis: {
                    axisTicks: {
                        show: false
                    },
                    axisBorder: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: "#616161",
                            fontSize: "12px",
                            fontFamily: "inherit",
                            fontWeight: 400
                        }
                    },
                    categories: ["Quiz","User did the quiz"]
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: "#939393",
                            fontSize: "12px",
                            fontFamily: "inherit",
                            fontWeight: 400
                        }
                    }
                },
                grid: {
                    show: true,
                    borderColor: "#dddddd",
                    strokeDashArray: 8,
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    padding: {
                        top: 5,
                        right: 0
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#bar-chart"), chartConfig);

            chart.render();
        </script>
        <!-- Main content -->

@endsection