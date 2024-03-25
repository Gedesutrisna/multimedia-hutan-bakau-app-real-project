@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/vlogs"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Tambah Video Blog</p>
        </div>
        <form action="/dashboard/vlogs" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Judul</label>
                <input name="title" id="title" value="{{ old('title') }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter title.." @error('title') is-invalid @enderror
                />
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] mb-2 font-Urbanist text-[#535355] font-medium">Teks</label>
                <textarea name="body" id="body" value="{{ old('body') }}"
                    type="text"
                    style="resize: none" @error('body') is-invalid @enderror
                >{{ old('body') }}</textarea>
                @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Url Embed Video*</label>
                <input name="url" id="url" value="{{ old('url') }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter url.." @error('url') is-invalid @enderror
                />
                @error('url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        

        <input type="hidden" class="form-control @error('slug') is-invalid @enderror form-control-sm" name="slug" id="slug" value="{{ old('slug') }}" required>
        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#428574] text-white rounded-[8px]">Tambah Video Blog</button>
            <button type="button" class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Batal</button>
        </div>
    </form>

    </div>
    <script>
        let body = new RichTextEditor("#body");

        const titleInput = document.querySelector('#title');
        const slugInput = document.querySelector('#slug');

        titleInput.addEventListener('change', function() {
        const titleValue = titleInput.value.toLowerCase().trim().replace(/\s+/g, '-');
        slugInput.value = titleValue;
        });

    </script>
@endsection