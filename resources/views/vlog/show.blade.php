@extends('layouts.main')
@section('container')

<div class="container mx-auto">
    <a href="/vlogs" class="absolute">
        <button class=""><img src="/assets/back-button.svg" alt=""></button>
    </a>
    <div class="py-[50px] xl:px-[100px] 2xl:px-[185px]">
        <div class="mt-[40px] flex justify-center">
            <div class="bg-[#eeeeee] w-full md:w-[1000px] 2xl:w-[1500px] h-[100%] rounded-[4px] py-[60px]">
                <div class="px-[20px] mx-auto w-full md:w-[800px]">
                    <p class="font-Urbanist text-[24px] sm:text-[42px] md:text-[48px] lg:text-[48px] font-bold text-center">{{ $vlog->title }}</p>
                    <div class="mt-[24px] overflow-hidden rounded-[4px]" style="height:400px;">
                        <embed class="w-full h-full md:h-[400px]" src="{{ $vlog->url }}" type="">
                    </div>

                    <div class="vlog-main">
                        <p class="text-[20px] sm:text-[18px] font-Urbanist font-normal mt-[24px] text-justify">{!! $vlog->body !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
