@extends('layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px] h-[100vh]">
        <div class="flex justify-between">
            <div class="flex gap-3">
                <a href="/quizzes"><img src="/asset/back logo.svg" alt=""></a>
                <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Kuis {{ $quiz->name }}</p>
            </div>
            <div class="">
                <a href="/quiz/{{ $quiz->slug }}/attempt">
                    <button class="mt-[14px] sm:mt-0 py-[14px] px-[16px] bg-[#6E62E5] rounded-[4px] gap-2 flex items-center text-white font-Urbanist text-[14px] font-medium"><img src="/asset/add-icon.svg" alt="" />Kerjakan Kuis</button>
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <ul class="grid grid-cols-10 bg-[#E4E5E9] rounded-[8px] p-[16px] mt-9 text-[14px] font-Urbanist font-medium text-[#78797A] w-[1000px] xl:w-full place-items-start">
                <li class="">Gambar</li>
                <li class="">Durasi</li>
                <li class="col-span-2">Nama</li>
                <li class="col-span-5">Deskripsi</li>
                <li class="">Pertanyaan</li>
            </ul>
            <ul class="grid grid-cols-10 bg-transparent place-items-start py-[20px] px-[14px] text-[15px] font-Urbanist font-medium text-[#08112F] border-b border-[#D9DADE text-[#08112F] font-Urbanist text-[15px] font-medium w-[1000px] xl:w-full place-items-start">
                <li class=""><img src="{{ asset('images/'.$quiz->image) }}" alt="" style="width: 40px"></li>
                <li class="">{{ $quiz->duration }} menit</li>
                <li class="col-span-2 whitespace-normal">{{ $quiz->name }}</li>
                <li class="col-span-5">{!! $quiz->description !!}</li>
                <li class="">{{ $quiz->questions->count() }} Pertanyaan</li>
            </ul>
        </div>

    </div>
@endsection