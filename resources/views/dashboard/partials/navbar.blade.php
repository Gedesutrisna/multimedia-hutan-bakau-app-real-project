<div class="nav-main pb-5 w-full flex justify-between">
    <button class="hamburger-menu lg:hidden" onclick="toggleSidebar()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path
                d="M0 16H16V13.3333H0V16ZM0 9.33333H16V6.66667H0V9.33333ZM0 0V2.66667H16V0H0Z"
                fill="#808183"
            />
        </svg>
    </button>

    <div class="search-nav xl:w-[80%] lg:w-[60%] hidden lg:flex">
        @if (request()->is('dashboard'))
            <input
                type="text"
                name="search"
                id="" style="background-image: url('/asset/search.svg')"
                class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
                placeholder="Cari apa saja.."
            />
        @elseif (request()->is('dashboard/blogs*'))
        <form action="/dashboard/blogs" method="get" class="w-[100%]">
            <input
                type="text"
                name="search"
                id="" style="background-image: url('/asset/search.svg')"
                class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
                placeholder="Cari apa saja.."
            />
        </form>
        @elseif(request()->is('dashboard/categories*'))
        <form action="/dashboard/categories" method="get" class="w-[100%]">
            <input
                type="text"
                name="search"
                id="" style="background-image: url('/asset/search.svg')"
                class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
                placeholder="Cari apa saja.."
            />
        </form>
        @elseif(request()->is('dashboard/quizzes*'))
        <form action="/dashboard/quizzes" method="get" class="w-[100%]">
            <input
                type="text"
                name="search"
                id="" style="background-image: url('/asset/search.svg')"
                class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
                placeholder="Cari apa saja.."
            />
        </form>
        @elseif(request()->is('dashboard/questions*'))
        <form action="/dashboard/questions" method="get" class="w-[100%]">
            <input
                type="text"
                name="search"
                id="" style="background-image: url('/asset/search.svg')"
                class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
                placeholder="Cari apa saja.."
            />
        </form>
        
        @elseif(request()->is('dashboard/answers*'))
        <form action="/dashboard/answers" method="get" class="w-[100%]">
            <input
                type="text"
                name="search"
                id="" style="background-image: url('/asset/search.svg')"
                class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
                placeholder="Cari apa saja.."
            />
        </form>
        
        @elseif(request()->is('dashboard/quiz/results*'))
        <form action="/dashboard/quiz/results" method="get" class="w-[100%]">
        <input
            type="text"
            name="search"
            id="" style="background-image: url('/asset/search.svg')"
            class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
            placeholder="Cari apa saja.."
        />
        </form>

        @elseif(request()->is('dashboard/users*'))
        <form action="/dashboard/users" method="get" class="w-[100%]">
        <input
            type="text"
            name="search"
            id="" style="background-image: url('/asset/search.svg')"
            class="w-[100%] rounded-[999px] border border-[#D9DADE] bg-[#F5F6FB]  bg-[16px] bg-no-repeat px-[36px] py-[14px] focus:outline-none"
            placeholder="Cari apa saja.."
        />
        </form>
        
        
        @endif
    </div>

    <div class="nav-main-wrapper flex items-center">
        <img src="/asset/line.svg" class="mx-[24px]" alt="" />

        <div class="avatar-profile">
            @if (empty(auth()->guard('admin')->user()->image))
            <img class="" src="/asset/profile-img.svg" alt="" />
            @else
            <img class="w-[40px] h-[40px]"  class="photo-profile" src="{{ asset('images/'.auth()->guard('admin')->user()->image) }}" alt="">
            @endif
            <p class="flex-none ps-3 font-Urbanist text-base font-medium text-[#141414] invisible sm:visible">
                {{ auth()->guard('admin')->user()->name }}
            </p>
        </div>
    </div>
</div>