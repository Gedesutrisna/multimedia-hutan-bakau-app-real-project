@extends('layouts.main')
@section('container')

    <!-- Main content -->


        <div class="content-main p-[32px] lg:ms-10 xl:ms-4 2xl:ms-0 bg-body h-[100vh]">
            <div class="flex gap-3">
                <a href="/profile"><img src="/asset/back logo.svg" alt=""></a>
                <div class="">
                    <h1 class="text-[#141414] font-Urbanist text-[28px] font-semibold">Hasil Kuis</h1>
                </div>
            </div>

            <div class="overflow-x-auto">
                <ul class="grid grid-cols-9 bg-[#E4E5E9] rounded-[8px] p-[16px] mt-9 text-[14px] font-Urbanist font-medium text-[#78797A] w-[1000px] xl:w-full place-items-start">
                    <li class="">#</li>
                    <li class="">Nilai</li>
                    <li class="col-span-3">Nama Pengguna</li>
                    <li class="col-span-2">Kuis</li>
                    <li class="col-span-2"></li>
                </ul>
                @foreach (auth()->user()->quizResults as $quiz_result)
                <ul class="grid grid-cols-9 bg-transparent place-items-start py-[20px] px-[14px] text-[15px] font-Urbanist font-medium text-[#08112F] border-b border-[#D9DADE text-[#08112F] font-Urbanist text-[15px] font-medium w-[1000px] xl:w-full place-items-start">
                    <li>{{ $loop->iteration }}</li>
                    <li class="">{{ $quiz_result->point }}</li>
                    <li class="col-span-3">{{ $quiz_result->user->name }}</li>
                    <li class="col-span-2">{{ $quiz_result->quiz->name }}</li>
                    <div class="col-span-2">
                        <a href="/quizzes/{{ $quiz_result->quiz->slug }}">
                            <button class="mt-[14px] sm:mt-0 py-[14px] px-[16px] bg-[#428574] rounded-[4px] gap-2 flex items-center text-white font-Urbanist text-[14px] font-medium"><img src="/asset/add-icon.svg" alt="" />Kerjakan Kembali</button>
                        </a>
                    </div>
                </ul>
                @endforeach
            </div>
        </div>


@endsection