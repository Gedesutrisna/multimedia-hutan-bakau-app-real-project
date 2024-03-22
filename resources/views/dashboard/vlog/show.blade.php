@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/vlogs"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Video Blog {{ $vlog->title }}</p>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Judul</label>
                <input name="title" id="title" value="{{ old('title',$vlog->title) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter title.." @error('title') is-invalid @enderror disabled
                />
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Teks</label>
                <div class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] bg-white h-[250px] overflow-y-auto">{!! $vlog->body !!}</div>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium mb-2">Video</label>
                <embed class="w-[200px]" src="{{ $vlog->url }}" type="">
            </div>
        </div>

    </div>

@endsection