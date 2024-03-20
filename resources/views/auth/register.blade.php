@extends('auth.layouts.main')
@section('container')
<div class="container-fluid bg-[#D7D1C6]">
	<div class="h-[100vh] xl:grid xl:grid-cols-12 2xl:place-items-center">

		<div class="sm:mx-[50px] xl:col-span-6 pt-[60px] xl:pt-[40px] 2xl:pt-0">
			<div class="flex justify-center">
				<button class="banner-btn mb-[8px]">Menjelajah Kehidupan Pesisir Eksotis Terpelihara Alami</button>
			</div>

			<p class="text-center font-Urbanist text-[26px] sm:text-[32px] font-bold text-[#141414] xl:text-[38px] 2xl:text-[52px]"> Mempelajari <span class="text-[#428574]"> Hutan Bakau</span>
				 <br /> Melestarikan <span class="text-[#428574]"> Alam</span>
			</p>

			<div class="flex w-full flex-col items-center">
				<form action="/register" method="POST">
					@csrf
					@method('POST')
				<div class="input-email mt-[8px] w-full xl:w-[515px]">
					<input name="name" class="placeholder-email" type="text" placeholder="Enter your name.." value="{{ old('name') }}" />
				</div>
				
				<div class="input-email mt-[8px] w-full xl:w-[515px]">
					<input name="email" class="placeholder-email" type="email" placeholder="Enter your email.." value="{{ old('email') }}" />
				</div>

				<div class="input-password mt-[8px] w-full xl:w-[515px]">
					<input name="password" class="placeholder-password" type="password" placeholder="Enter your password.." value="{{ old('password') }}" />
				</div>

				<button type="submit"
					class="mt-[18px] flex h-[49px] w-full items-center justify-center gap-2 rounded-[4px] bg-[#D9E9E4] font-Urbanist text-[14px] font-medium text-[#1A3C40] xl:w-[515px]"
				>Create an Account
					<img src="/assets/arrow-btn.svg" alt="" />
				</button>
				</form>
			</div>

			<div class="flex justify-center">
				<hr class="mb-[24px] mt-[32px] w-[488px] text-[#1A3C40]" />
			</div>

			<div class="flex justify-center pb-[107px] xl:pb-0">
				<a href="/login" class="text-center font-Urbanist text-[14px] font-medium text-[#726F6A] xl:text-left">
					Already have an account?
					<span class="text-[#428574]"> Login Account</span>
				</a>
			</div>
		</div>

		<div class="xl:col-span-6 2xl:ms-16">
			<img src="/assets/Login-Img.svg" class="hidden xl:grid w-full h-full" />
		</div>
	</div>
</div>
@endsection
