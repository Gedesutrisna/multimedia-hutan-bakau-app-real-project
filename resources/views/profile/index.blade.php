@extends('layouts.main')
@section('container')
<div class="container mx-auto">
    <div class="flex items-center mt-[48px] gap-4">
        <a href="/">
            <button><img src="/assets/back-button.svg" alt=""></button>
        </a>
        <p class="font-Urbanist text-[36px] font-bold">Profile</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12">
        <div class="col-span-6 mt-[48px]">
            <p class="font-Urbanist text-[36px] font-bold">Info</p>
            <form action="/profile/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-email mt-[8px] w-full xl:w-[515px]">
                    <input name="name"  @error('name') is-invalid @enderror value="{{ old('name',auth()->user()->name) }}" class="placeholder-email" type="text" placeholder="Enter your name.." />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-email mt-[8px] w-full xl:w-[515px]">
                    <input name="email"  @error('email') is-invalid @enderror value="{{ old('email',auth()->user()->email) }}" class="placeholder-email" type="email" placeholder="Enter your email.." />
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-password mt-[8px] w-full xl:w-[515px]">
                    <input name="password"  @error('password') is-invalid @enderror value="{{ old('password',auth()->user()->password) }}" class="placeholder-password" type="password" placeholder="Enter your password.." />
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-email mt-[14px] w-full xl:w-[515px]">
                    <div class="w-full">
                        <input name="image" id="image" onchange="previewImage()"  @error('image') is-invalid @enderror value="{{ old('image',auth()->user()->image) }}" class="placeholder-email" type="file" placeholder="Enter your image.." />
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        @if(auth()->user()->image)
                        <img class="img-preview mt-3" id="img-preview" src="{{ asset('images/'.auth()->user()->image) }}" frameborder="0" style="width: 50px">
                        @else
                        <img class="img-preview mt-3" id="img-preview" src="" frameborder="0">
                        @endif
                    </div>
                </div>
                <button type="submit" class="mt-[90px] w-full bg-[#D9E9E4] font-Urbanist text-base font-semibold text-[#1A3C40] py-4  xl:w-[515px] sm:px-[40px] rounded-[6px]">Update Profile</button>
            </form>
        </div> 
        <div class="mt-[48px] gap-[24px] col-span-6 lg:ms-[50px] mb-10">
            <p class="font-Urbanist text-[36px] font-bold mb-[14px]">Quiz History</p>
            @foreach (auth()->user()->quizResults as $quiz_result)
            
            <div class="p-4 bg-[#428574] rounded-[3px] w-full">
                <p class="font-Urbanist font-bold text-[20px] text-white">Telah berhasil mengerjakan quiz {{ $quiz_result->quiz->name }}</p>
                <div class="flex items-start mt-3">
                    <img class="w-[60px]" src="{{ asset('images/'.$quiz_result->user->image) }}" alt="">
                    <div class="ms-4">
                        <p class="font-Urbanist font-bold text-[20px] text-white">Nilai : {{ $quiz_result->point }} /100</p>
                        <p class="text-base text-white font-Urbanist">Benar {{ round($quiz_result->point * $quiz_result->quiz->questions->count() / 100) }} dari total {{ $quiz_result->quiz->questions->count() }} soal</p>
                    </div>
                </div>
                <div class="flex justify-center">
                    <hr class="my-[24px] w-[100%] text-[#1A3C40]" />
                </div>
                <div class="flex flex-col items-end justify-between sm:flex-row">
                    <p class="text-[14px] font-semibold text-white font-Urbanist">{{ $quiz_result->created_at->format('d M Y') }}</p>
                    <a class="" href="/quizzes/{{ $quiz_result->quiz->slug }}">
                        <button class="w-full bg-[#D9E9E4] font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[48px] rounded-[6px]">Kerjakan Kembali</button>
                    </a>
                </div> 
            </div>
            
            @endforeach
        </div>
        
    </div>
</div>
    <script>
        function previewImage(){
            const img = document.querySelector('#image');
            const imgPreview = document.querySelector('#img-preview');
            if (img.files.length > 0) {
                const blob = URL.createObjectURL(img.files[0]);
                imgPreview.style.display = 'block';
                imgPreview.style.height = '50px';
                imgPreview.src = blob;
            } else {
                imgPreview.style.display = 'none';
            }
        }
    </script>
@endsection