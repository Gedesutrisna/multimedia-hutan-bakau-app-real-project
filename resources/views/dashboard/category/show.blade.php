@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px] h-[90vh]">
        <div class="flex gap-3">
            <a href="/dashboard/categories"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Kategori {{ $category->name }}</p>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Nama</label>
                <input name="name" id="name" value="{{ old('name',$category->name) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter name.." @error('name') is-invalid @enderror disabled
                />
            </div>
        </div>
        
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Deskripsi</label>
                <textarea name="description" value="{{ old('description', $category->description) }}" disabled
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter description.." style="resize: none" @error('description') is-invalid @enderror
                >{{ old('description', $category->description) }}</textarea>
            </div>
        </div>

    </div>
@endsection