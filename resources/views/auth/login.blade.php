@extends('auth.layouts.main')
@section('container')
		<main class="login-page">
			<div class="container-fluid">
				<div class="wrapper-content-login">
					
					<div class="left-wrapper-img">
						<img class="left-img-hero hidden xl:grid" src="/asset/img-hero-login.svg" alt="" />
					</div>

					<div class="right-wrapper-login mb-[100px]">

						<p class="login-dashboard">
							Login 
						</p>

						<div class="flex w-full flex-col items-center xl:items-start">
                            <form action="/login" method="POST">
                                @csrf
                                @method('POST')
								<div class="input-email-login mt-[24px] w-full xl:w-[340px]">
									<input name="email" class="placeholder-email-login focus:outline-none" type="text" placeholder="Enter your email.." 
                                    @if (isset($_COOKIE["email"]))
                                        value="{{ $_COOKIE['email'] }}"
                                    @else
                                        value="{{ old('email') }}"
                                    @endif
									/>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
								</div>
								<div class="input-password-login mt-2 w-full xl:w-[340px]">
									<input name="password" class="placeholder-password-login focus:outline-none" type="password" placeholder="Enter your password.."
									@if (isset($_COOKIE["password"]))
									value="{{ $_COOKIE['password'] }}"
									@else
										value="{{ old('password') }}"
									@endif
									/>
								</div>
								<button type="submit" class="button-login">Login akun<img src="/asset/arrow-btn.svg" alt="" /></button>
							</form>
						</div>

						<hr class="my-[22px]" />

						<div class="flex justify-center xl:justify-start">
							<a href="/register" class="text-center font-Urbanist text-[14px] font-medium text-[#858585] xl:text-left">Tidak mempunyai akun?<span class="text-primary"> Daftar gratis </span></a>
						</div>

					</div>
				</div>
			</div>
		</main>
@endsection
