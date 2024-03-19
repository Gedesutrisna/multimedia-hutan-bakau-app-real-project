@extends('layouts.main')
@section('container')

        <div class="container mx-auto">
            <a href="/blogs" class="absolute">
                <button class=""><img src="/assets/back-button.svg" alt=""></button>
            </a>
            <div class="py-[50px] xl:px-[100px] 2xl:px-[185px]">
                <div class="flex justify-center">
                    <div class="bg-[#eeeeee] w-[1000px] h-[100%] rounded-[4px] py-[60px]">
                        <div class="mx-auto w-[800px]">
                            <p class="font-Urbanist text-[24px] sm:text-[42px] md:text-[48px] lg:text-[64px] font-bold text-center">{{ $blog->title }}</p>
                            <div class="mt-[24px] h-[300px] overflow-hidden rounded-[4px]">
                                <img class="w-full" src="{{ asset('images/'.$blog->assets) }}" alt="">
                            </div>
    
                            <div class="blog-main">
                                <p class="text-[20px] sm:text-[18px] font-Urbanist font-normal mt-[24px] text-justify">{!! $blog->body !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection