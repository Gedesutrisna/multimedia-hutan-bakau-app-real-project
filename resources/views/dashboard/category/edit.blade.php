@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px] h-[90vh]">
        <div class="flex gap-3">
            <a href="/dashboard/categories"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Edit Kategori {{ $category->title }}</p>
        </div>
        <form action="/dashboard/categories/{{ $category->slug }}" method="post">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Nama</label>
                <input name="name" id="name" value="{{ old('name',$category->name) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter name.." @error('name') is-invalid @enderror
                />
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Deskripsi</label>
                <textarea name="description" value="{{ old('description', $category->description) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter description.." style="resize: none" @error('description') is-invalid @enderror
                >{{ old('description', $category->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        

        <input type="hidden" class="form-control @error('slug') is-invalid @enderror form-control-sm" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" required>
        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#428574] text-white rounded-[8px]">Edit Kategori</button>
            <button type="button" class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Batal Edit</button>
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