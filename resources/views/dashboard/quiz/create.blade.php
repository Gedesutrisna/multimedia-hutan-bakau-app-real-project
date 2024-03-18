@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/quizzes"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Tambah Kuis</p>
        </div>
        <form action="/dashboard/quizzes" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Nama</label>
                <input name="name" id="name" value="{{ old('name') }}"
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
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Durasi</label>
                <input name="duration" id="duration" value="{{ old('duration') }}"
                    type="number"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter duration.." @error('duration') is-invalid @enderror
                />
                @error('duration')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Deskripsi</label>
                <textarea name="description" id="description" value="{{ old('description') }}"
                    type="text"
                    style="resize: none" @error('description') is-invalid @enderror
                >{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Gambar</label>
                <input name="image" id="image" value="{{ old('image') }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter image.." @error('image') is-invalid @enderror
                />
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <img class="img-preview" style="display: none;" id="img-preview" src="" frameborder="0"></img>

            </div>
        </div>
        <input type="hidden" class="form-control @error('slug') is-invalid @enderror form-control-sm" name="slug" id="slug" value="{{ old('slug') }}" required>

        <hr class="mt-1">

        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#428574] text-white rounded-[8px]">Tambah Kuis</button>
            <button type="button" class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Batal</button>
        </div>
    </form>

    </div>
    <script>
        let description = new RichTextEditor("#description");

        const titleInput = document.querySelector('#name');
        const slugInput = document.querySelector('#slug');

        titleInput.addEventListener('change', function() {
        const titleValue = titleInput.value.toLowerCase().trim().replace(/\s+/g, '-');
        slugInput.value = titleValue;
        });

        function previewImage(){
            const img = document.querySelector('#image');
            const imgPreview = document.querySelector('#img-preview');
            if (img.files.length > 0) {
                const blob = URL.createObjectURL(img.files[0]);
                imgPreview.style.display = 'block';
                imgPreview.style.height = '200px';
                imgPreview.src = blob;
            } else {
                imgPreview.style.display = 'none';
            }
        }
    </script>
@endsection