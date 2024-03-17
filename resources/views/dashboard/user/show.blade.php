@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/users"><img src="/asset/back logo.svg" alt=""></a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Pengguna {{ $user->name }}</p>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Nama</label>
                <input name="name" id="name" value="{{ old('name',$user->name) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter name.." @error('name') is-invalid @enderror disabled
                />
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Email</label>
                <input name="email" id="email" value="{{ old('email',$user->email) }}"
                    type="email"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter email.." @error('email') is-invalid @enderror disabled
                />
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Password</label>
                <input name="password" id="password" value="{{ old('password',$user->password) }}"
                    type="password"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter password.." @error('password') is-invalid @enderror disabled
                />
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium mb-2">Gambar</label>
                @if($user->image)
                <img class="img-preview" id="img-preview" src="{{ asset('images/'.$user->image) }}" frameborder="0" style="width: 200px">
                @else
                <img class="img-preview" id="img-preview" src="" frameborder="0">
                @endif
            </div>
        </div>
        


    </div>

@endsection