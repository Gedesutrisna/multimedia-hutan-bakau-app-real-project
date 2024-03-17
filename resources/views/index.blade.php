@extends('layouts.main')
@section('container')

    <!-- Main content -->


        <div class="content-main p-[32px] lg:ms-10 xl:ms-4 2xl:ms-0 bg-body h-[100vh]">
            @if (auth()->check())
            <form class="mb-0" action="/logout" method="POST">
                @csrf
                <button type="submit" class="navbar-btn">
                    <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Logout</h1>
                </button>
            </form>
            <a href="/profile">
                <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Profile</h1>
            </a>
            <a href="/quiz/results">
                <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Hasil Kuis</h1>
            </a>
            @else
            <a href="/login">
                <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Login</h1>
            </a>
            @endif
            <div class="sm:flex sm:justify-between block items-end">
                <div class="">
                    <a href="/blogs">
                        <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Blog</h1>
                    </a>
                    <a href="/quizzes">
                        <h1 class="text-cyan-500 font-Urbanist text-[28px] font-semibold"> - Quiz</h1>
                    </a>
                </div>
            </div>

        </div>


@endsection