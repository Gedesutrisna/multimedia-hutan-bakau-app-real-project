@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Edit Answer</p>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Question</label>
            <textarea name="quiz_question_id" value="{{ old('quiz_question_id', $answer->quiz_question_id) }}" disabled
                type="text"
                class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
               style="resize: none" @error('quiz_question_id') is-invalid @enderror
            >{{ old('quiz_question_id', $answer->quiz_question->question) }}</textarea>
            </div>
        </div>
        @if (empty($answer->answer_image))
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Answer Text</label>
                <textarea name="answer_text" value="{{ old('answer_text', $answer->answer_text) }}" disabled
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                   style="resize: none" @error('answer_text') is-invalid @enderror
                >{{ old('answer_text', $answer->answer_text) }}</textarea>
                </div>
        </div>
        @else
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium mb-2">Answer Image</label>
                @if($answer->image)
                <img class="img-preview" id="img-preview" src="{{ asset('images/'.$answer->image) }}" frameborder="0" style="width: 200px">
                @else
                <img class="img-preview" id="img-preview" src="" frameborder="0">
                @endif
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Point</label>
                <input name="point" id="point" value="{{ old('point', $answer->point) }}"
                    type="number" disabled
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter point.." @error('point') is-invalid @enderror
                />
            </div>
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Is Correct</label
                >
                @if ($answer->is_correct == "true")
                <input name="is_correct" id="is_correct" value="Correct"
                type="text" disabled
                class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                placeholder="Enter is correct.." @error('is_correct') is-invalid @enderror
            />
                    
                @else
                    
                <input name="is_correct" id="is_correct" value="Incorrect"
                type="text" disabled
                class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                placeholder="Enter is correct.." @error('is_correct') is-invalid @enderror
            />
                @endif
            </div>
        </div>

    </div>
@endsection