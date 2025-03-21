@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/blogs"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Edit Blog {{ $blog->title }}</p>
        </div>
        <form action="/dashboard/blogs/{{ $blog->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Judul</label>
                <input name="title" id="title" value="{{ old('title',$blog->title) }}"
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
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Kategori</label
                >
                <select name="category_id" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('category_id') is-invalid @enderror>
                    @foreach ($categories as $category)
                    @if (old('category_id', $blog->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name}}</option>    
                        @else
                    <option value="{{ $category->id }}">{{ $category->name}}</option>
                    @endif
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] mb-2 font-Urbanist text-[#535355] font-medium">Teks</label>
                <textarea name="body" id="body" value="{{ old('body', $blog->body) }}"
                    type="text"
                    style="resize: none" @error('body') is-invalid @enderror
                >{{ old('body', $blog->body) }}</textarea>

                @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Gambar</label>
                <input name="assets" id="assets" value="{{ old('assets', $blog->assets) }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter image.." @error('assets') is-invalid @enderror
                />
                @error('assets')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                @if($blog->assets)
                <img class="img-preview" id="img-preview" src="{{ asset('images/'.$blog->assets) }}" frameborder="0" style="width: 200px">
                @else
                <img class="img-preview" id="img-preview" src="" frameborder="0">
                @endif
            </div>
        </div>
        

        <input type="hidden" class="form-control @error('slug') is-invalid @enderror form-control-sm" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}" required>
        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#428574] text-white rounded-[8px]">Edit Blog</button>
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

        function previewImage(){
            const img = document.querySelector('#assets');
            const imgPreview = document.querySelector('#img-preview');
            imgPreview.style.display = 'block';
            imgPreview.style.height = '200px';
            const blob = URL.createObjectURL(img.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection