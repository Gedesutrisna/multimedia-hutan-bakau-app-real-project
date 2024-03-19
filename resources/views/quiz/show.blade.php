@extends('layouts.main')
@section('container')
<div class="container mx-auto">
    <div class="py-[50px] xl:px-[100px] 2xl:px-[185px]">
        <div class="flex justify-center">
            <div class="absolute px-[132px] py-[12px] bg-[#428574] rounded-[200px] text-base font-Urbanist font-bold text-white top-[120px] md:top-[130px]">Materi</div>
            <div class="bg-[#eeeeee] w-[1000px] h-[100%] rounded-[4px]">
                <div class="px-[20px] mx-auto w-full md:w-[800px]">
                    <p class="font-Urbanist text-[24px] sm:text-[42px] md:text-[48px] lg:text-[64px] font-bold text-center mt-[40px] mb-[24px]">{{ $quiz->name }}</p>
                    <div class="h-full overflow-hidden rounded-[4px]">
                        <img class="w-full" src="{{ asset('/images'.$quiz->image) }}" alt="">
                    </div>
                    <div class="mb-[60px] overflow-hidden ">
                        <p class="font-Urbanist font-bold text-[20px] sm:text-[20px] mt-[14px]">Durasi Quiz : {{  $quiz->duration  }} menit</p>
                        <p class="font-Urbanist font-bold text-[20px] sm:text-[20px]">Jumlah : {{  $quiz->questions->count()  }} soal</p>
                        <div class="flex justify-center">
                            <hr class="mt-[20px] w-[100%] text-[#1A3C40]" />
                        </div>
                        <p class="text-[16px] sm:text-[18px] font-Urbanist font-normal mt-[14px] text-justify">{!! $quiz->description !!}</p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="flex justify-between">
            <a class="flex justify-center mt-[24px]" href="/quizzes"><button class="bg-[#D9E9E4] font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[20px] sm:px-[40px] rounded-[6px]">Kembali</button></a>
            <a class="flex justify-center mt-[24px]" href="/quiz/{{ $quiz->slug }}/attempt"><button class="bg-[#D9E9E4] font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[20px] sm:px-[40px] rounded-[6px]">Mulai Quiz</button></a>
        </div>
    </div>
</div>
@endsection