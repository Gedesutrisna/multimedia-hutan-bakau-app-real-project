@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3 items-center">
            <a href="/dashboard/quizzes/{{ $answer->quiz_question->quiz->slug }}/questions/{{ $answer->quiz_question->id }}">
                <img src="/asset/back logo.svg" alt="">
            </a>
            <div class="">
                <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Edit Answer</p>
                <p class="text-[#535355] text-[14px] font-Urbanist font-medium mt-1"><span class="text-red-500 text-[20px]">*</span>Choose answer using Text or Image</p>
            </div>
        </div>
        <form action="/dashboard/answers/{{ $answer->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Question</label
                >
                <select name="quiz_question_id" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('quiz_question_id') is-invalid @enderror>
                    <option value="" disabled>Select Question</option>
                    @php $lastQuizName = null; @endphp
                    @foreach ($questions as $question)
                        @php
                            $questionCount = $question->answers()->count();
                            $currentQuizName = $question->quiz->name;
                        @endphp
                        @if (old('quiz_question_id', $answer->quiz_question_id) == $question->id)
                            @if ($currentQuizName != $lastQuizName)
                            @php $lastQuizName = $currentQuizName; @endphp
                                <optgroup label="{{ $currentQuizName }}">
                            @endif
                                <option value="{{ $question->id }}" selected>{{ $question->question}}</option>   
                            @if ($currentQuizName != $lastQuizName)
                                </optgroup>
                            @endif 
                        @else
                            @if ($questionCount < 4)
                                @if ($currentQuizName != $lastQuizName)
                                    @php $lastQuizName = $currentQuizName; @endphp
                                    <optgroup label="{{ $currentQuizName }}">
                                @endif
                    
                                <option value="{{ $question->id }}">{{ $question->question }}</option>
                    
                                @if ($currentQuizName != $lastQuizName)
                                    </optgroup>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </select>
                @error('quiz_question_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"><span class="text-red-500 text-[20px]">*</span>Answer Text</label>
                <input name="answer_text" id="answer_text" value="{{ old('answer_text', $answer->answer_text) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter text.." @error('answer_text') is-invalid @enderror
                />
                @error('answer_text')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"><span class="text-red-500 text-[20px]">*</span>Answer Image</label>
                <input name="answer_image" id="answer_image" value="{{ old('answer_image', $answer->answer_image) }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter image.." @error('answer_image') is-invalid @enderror
                />
                @error('answer_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <img class="img-preview" style="display: none;" id="img-preview" src="" frameborder="0"></img>

            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Is Correct</label
                >
                <select name="is_correct" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('is_correct') is-invalid @enderror>
                    <option value="" disabled>Select Correct or Incorrect</option>
                            @if (old('is_correct', $answer->is_correct) == "true")
                                <option value="true" selected>Correct</option>    
                                <option value="false" >Incorrect</option>    
                            @else
                                <option value="true">Correct</option>
                                <option value="false" selected>Incorrect</option>
                            @endif
                </select>
                @error('is_correct')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <input type="hidden" class="form-control @error('slug') is-invalid @enderror form-control-sm" name="slug" id="slug" value="{{ old('slug') }}" required>
        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#6E62E5] text-white rounded-[8px]">Edit Answer</button>
            <button class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Cancel Edit</button>
        </div>
    </form>

    </div>
    <script>

        const titleInput = document.querySelector('#name');
        const slugInput = document.querySelector('#slug');

        titleInput.addEventListener('change', function() {
        const titleValue = titleInput.value.toLowerCase().trim().replace(/\s+/g, '-');
        slugInput.value = titleValue;
        });

        function previewImage(){
            const img = document.querySelector('#answer_image');
            const imgPreview = document.querySelector('#img-preview');
            if (img.files.length > 0) {
                const blob = URL.createObjectURL(img.files[0]);
                imgPreview.style.display = 'block';
                imgPreview.style.height = '200px';
                imgPreview.src = blob;
            } else {
                imgPreview.style.display = 'none';
            }
        }
    </script>
@endsection