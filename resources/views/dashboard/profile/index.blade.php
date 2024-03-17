@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Profile {{ auth()->guard('admin')->user()->name }}</p>
        <form action="/dashboard/profile/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Nama</label>
                <input name="name" id="name" value="{{ old('name',auth()->guard('admin')->user()->name) }}"
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
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Email</label>
                <input name="email" id="email" value="{{ old('email',auth()->guard('admin')->user()->email) }}"
                    type="email"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter email.." @error('email') is-invalid @enderror
                />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] mb-2 font-Urbanist text-[#535355] font-medium">Password</label>
                <input name="password" id="password" value="{{ old('password',auth()->guard('admin')->user()->password) }}"
                    type="password"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter password.." @error('password') is-invalid @enderror
                />
                @error('password')
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
                @if(auth()->guard('admin')->user()->image)
                <img class="img-preview" id="img-preview" src="{{ asset('images/'.auth()->guard('admin')->user()->image) }}" frameborder="0" style="width: 200px">
                @else
                <img class="img-preview" id="img-preview" src="" frameborder="0">
                @endif
            </div>
        </div>
        

        <input type="hidden" class="form-control @error('slug') is-invalid @enderror form-control-sm" name="slug" id="slug" value="{{ old('slug') }}" required>
        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#6E62E5] text-white rounded-[8px]">Edit Profile</button>
            <button class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Batal Edit</button>
        </div>
    </form>

    </div>
    <script>
        // let body = new RichTextEditor("#body");

        const titleInput = document.querySelector('#title');
        const slugInput = document.querySelector('#slug');

        titleInput.addEventListener('change', function() {
        const titleValue = titleInput.value.toLowerCase().trim().replace(/\s+/g, '-');
        slugInput.value = titleValue;
        });

        function previewImage(){
            const img = document.querySelector('#assets');
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