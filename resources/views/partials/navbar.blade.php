<div class="">
    <nav class="container mx-auto">
        <div class="flex justify-between items-center py-[24px]">
            <div class=""><img src="/assets/logo.svg" alt=""></div>
                 <div class="hidden lg:block lg:space-x-[24px] 2xl:space-x-[48px]  2xl:ms-0">
                    <a href="/" class="font-Urbanist font-semibold text-base text-[#1A3C40]">Home</a>
                    <a href="/blogs" class="font-Urbanist font-semibold text-base text-[#1A3C40]">Blog</a>
                    <a href="/quizzes" class="font-Urbanist font-semibold text-base text-[#1A3C40]">Kuis</a>
                 </div>
                <div class="hidden lg:flex items-center space-x-[40px]">
                    @if (auth()->check())
                    <a href="/profile" ><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[40px] rounded-[4px] flex gap-3">{{ auth()->user()->name }} 
                        @if (empty(auth()->user()->image))
                        <img src="/assets/user-profile.svg" alt="">
                        @else
                        <img class="w-[24px] h-[24px]" src="{{ asset('images/'.auth()->user()->image) }}" alt="">
                        @endif
                    </button></a> 
                    @else
                    <a href="/register" class="font-Urbanist text-base font-semibold text-[#1A3C40]">Sign Up</a>
                    <a href="/login"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[40px] rounded-[4px]">Sign In</button></a> 
                    @endif
                </div>
                <div class="lg:hidden">
                <button id="burger-icon" class="text-[#1A3C40] focus:outline-none sm:me-[20px]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                </div>
        </div>
    </nav>

    <div id="sidebar" class="lg:hidden fixed inset-0 bg-[#D7D1C6] z-50 hidden">
        <div class="flex justify-end p-4">
            <button id="close-icon" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
            <div class="flex flex-col items-center space-y-[44px]">
                <a href="/" class="font-Urbanist font-semibold text-base text-[#1A3C40]">Home</a>
                <a href="/blogs" class="font-Urbanist font-semibold text-base text-[#1A3C40]">Blog</a>
                <a href="/quizzes" class="font-Urbanist font-semibold text-base text-[#1A3C40]">Kuis</a>
                @if (auth()->check())
                <a href="/profile" ><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[40px] rounded-[4px] flex gap-3">{{ auth()->user()->name }} 
                    @if (empty(auth()->user()->image))
                    <img src="/assets/user-profile.svg" alt="">
                    @else
                    <img class="w-[24px] h-[24px]" src="{{ asset('images/'.auth()->user()->image) }}" alt="">
                    @endif
                </button></a> 
                @else
                <a href="/register" class="font-Urbanist text-base font-semibold text-[#1A3C40]">Sign Up</a>
                <a href="/login"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[40px] rounded-[4px]">Sign In</button></a> 
                @endif
            </div>
        </div>
</div>
