@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/blogs"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Blog {{ $blog->title }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Judul</label>
                <input name="title" id="title" value="{{ old('title',$blog->title) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter title.." @error('title') is-invalid @enderror disabled
                />
            </div>
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Kategori</label
                >
                <input name="category_id" id="category_id" value="{{ old('category_id',$blog->category->name) }}"
                type="text"
                class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                placeholder="Enter category_id.." @error('category_id') is-invalid @enderror disabled
            />
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Teks</label>
                <textarea name="body" value="{{ old('body', $blog->body) }}" disabled
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white h-[250px]"
                    placeholder="Enter body.." style="resize: none" @error('body') is-invalid @enderror
                >{!! $blog->body !!}</textarea>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium mb-2">Gambar</label>
                @if($blog->assets)
                <img class="img-preview" id="img-preview" src="{{ asset('images/'.$blog->assets) }}" frameborder="0" style="width: 200px">
                @else
                <img class="img-preview" id="img-preview" src="" frameborder="0">
                @endif
            </div>
        </div>
        


    </div>

@endsection