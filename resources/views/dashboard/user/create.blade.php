@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/users"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Tambah Pengguna</p>
        </div>
        <form action="/dashboard/users" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 mt-9 gap-4">
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
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Email</label>
                <input name="email" id="email" value="{{ old('email') }}"
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
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Password</label>
                <input name="password" id="password" value="{{ old('password') }}"
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
                <img class="img-preview" style="display: none;" id="img-preview" src="" frameborder="0"></img>

            </div>
        </div>
        

        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#428574] text-white rounded-[8px]">Tambah Pengguna</button>
            <button type="button" class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Batal</button>
        </div>
    </form>

    </div>
    <script>

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