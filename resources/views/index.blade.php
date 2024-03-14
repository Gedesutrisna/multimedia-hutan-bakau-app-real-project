@extends('layouts.main')
@section('container')

    <!-- Main content -->


        <div class="content-main p-[32px] lg:ms-10 xl:ms-4 2xl:ms-0 bg-body h-[100vh]">
            @if (auth()->check())
            <a href="/profile">
                <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Profile</h1>
            </a>
            <form class="mb-0" action="/logout" method="POST">
                @csrf
                <button type="submit" class="navbar-btn">
                    <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Logout</h1>
                </button>
            </form>
            @else
            <a href="/login">
                <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Login</h1>
            </a>
            @endif
            <div class="sm:flex sm:justify-between block items-end">
                <div class="">
                    <a href="/blogs">
                        <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Go To Blogs</h1>
                    </a>
                    <a href="/quizzes">
                        <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Go To Quizzes</h1>
                    </a>
                </div>
            </div>

        </div>


@endsection