@extends('layouts.main')
@section('container')
<div class="flex items-center justify-center mt-[68px]">
    <div class="md:w-[100%] lg:w-[500px]  px-4 py-3 relative bg-[#428574] rounded-[4px]">
        <form action="/blogs" method="get" class="w-[100%]">
        <input name="search" class="bg-transparent font-Urbanist font-medium text-[20px] placeholder:text-[#D9E9E4] rounded-[4px] ps-[50px] outline-none text-[#D9E9E4]" type="text" name="" id="" placeholder="Cari Blog">
        <img class="absolute top-0 mt-[16px]" src="/assets/search-img.svg" alt="">
        </form>
    </div>
</div> 

<div class="mt-[44px]">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-3 grid-cols-1 sm:grid-cols-2 mt-[48px] gap-[44px] w-full h-full">
            @foreach ($all_blogs as $blog)
                
            @if ($blog->url)
            <a href="/vlogs/{{ $blog->slug }}" class="">
                @elseif($blog->assets)
                <a href="/blogs/{{ $blog->slug }}" class="">
                @endif
                <div class="relative">
                    @if ($blog->url)
                    <embed class="xl:w-[338px] xl:h-[250px] w-full h-full " src="//www.youtube.com/embed/vMgbfRa3HrA?iv_load_policy=3&modestbranding=1&playinline=1&showinfo=0&rel=0&enablejsapi=1" type="">
                    @elseif($blog->assets)
                    <img class="xl:w-[400px] xl:h-[214px] w-full h-full " src="{{ asset('images/'.$blog->assets) }}" alt="">
                    @endif
                    @if ($blog->url)
                    <div class="absolute px-[28px] py-[5.5px] bg-[#D9E9E4] bottom-0 right-0 font-Urbanist text-[12px] font-semibold">Video Blog</div>
                    @elseif($blog->assets)
                    <div class="absolute px-[28px] py-[5.5px] bg-[#D9E9E4] bottom-0 right-0 font-Urbanist text-[12px] font-semibold">Blog</div>
                    @endif
                </div>
                
                <div class="mt-3">
                    <p class="2xl:text-[27px] xl:text-[24px] font-Urbanist font-bold">{{ Str::limit($blog->title, 50) }}</p>
                    <p class="font-Urbanist mt-3 text-[14px] font-medium leading-[18px] text-[#101828]">{!! Str::limit($blog->description, 90) !!}</p>
                    <p class="font-semibold font-Urbanist text-[14px] text-[#101828] mt-3">{{ $blog->created_at->format('d M Y') }}</p>
                </div> 
            </a>
            @endforeach

    </div>

</div>
@endsection