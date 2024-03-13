@extends('auth.layouts.main')
@section('container')
		<main class="login-page">
			<div class="container-fluid">
				<div class="wrapper-content-login">
					
					<div class="left-wrapper-img">
						<img class="left-img-hero hidden xl:grid" src="/asset/img-hero-login.svg" alt="" />
					</div>

					<div class="right-wrapper-login">

						<div class="flex justify-center xl:justify-start">
							<button class="banner-btn-login mb-4">Login Account Page</button>
						</div>

						<p class="login-dashboard">
							Log in to Our Dashboard System
						</p>

						<div class="flex w-full flex-col items-center xl:items-start">
						  <form action="/public/index.html">
								<div class="input-email-login mt-[24px] w-full xl:w-[340px]">
									<input class="placeholder-email-login focus:outline-none" type="text" placeholder="Enter your email.." />
								</div>
						   </form>
							<div class="input-password-login mt-2 w-full xl:w-[340px]">
								<input class="placeholder-password-login focus:outline-none" type="text" placeholder="Enter your password.." />
							</div>
							<button class="button-login">Login account<img src="/asset/arrow-btn.svg" alt="" /></button>
						</div>

						<hr class="my-[32px]" />

						<div class="flex justify-center xl:justify-start">
							<a href="/public/register.html" class="text-center font-Urbanist text-[14px] font-medium text-[#858585] xl:text-left">Don’t have an account?<span class="text-primary"> Register for Free </span></a>
						</div>

					</div>
				</div>
			</div>
		</main>
@endsection
