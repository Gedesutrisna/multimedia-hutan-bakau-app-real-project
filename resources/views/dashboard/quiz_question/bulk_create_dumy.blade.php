@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px] h-[100vh]">
        <div class="flex gap-3 items-center">
            <a href="/dashboard/questions"><img src="/asset/back logo.svg" alt=""></a>
            <div class="">
                <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Add New Question</p>
            </div>
        </div>
        <form action="/dashboard/questions/bulk-create-dumy" method="post">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 mt-3 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Quiz</label
                >
                <select name="quiz_id" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('quiz_id') is-invalid @enderror>
                    <option value="" disabled>Select Quiz</option>
                    @foreach ($quizzes as $quiz)
                        @php
                            $questionCount = $quiz->questions()->count();
                        @endphp
                        @if ($questionCount < 15)
                            @if (old('quiz_id') == $quiz->id)
                                <option value="{{ $quiz->id }}" selected>{{ $quiz->name}}</option>    
                            @else
                                <option value="{{ $quiz->id }}">{{ $quiz->name}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
                
                @error('quiz_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"><span class="text-red-500 text-[20px]">*</span>Total Questions</label>
                <input name="quantity" id="quantity" value="{{ old('quantity') }}"
                    type="number"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter text.." @error('quantity') is-invalid @enderror
                />
                @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#6E62E5] text-white rounded-[8px]">Add New Question</button>
            <button class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Cancel Add</button>
        </div>
    </form>

    </div>
@endsection