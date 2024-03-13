@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3 items-center">
            <a href="/dashboard/answers"><img src="/asset/back logo.svg" alt=""></a>
            <div class="">
                <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Add New Answer</p>
                <p class="text-[#141414] text-[14px] font-Urbanist font-semibold"><span class="text-red-500 text-[20px]">*</span>4 answer</p>
            </div>
        </div>
        <form action="/dashboard/answers/bulk-create" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 mt-3 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Question</label
                >
                <select name="quiz_question_id" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('quiz_question_id') is-invalid @enderror>
                    <option value="" disabled>Select Question</option>
                    @foreach ($questions as $question)
                        @php
                            $questionCount = $question->answers()->count();
                        @endphp
                        @if ($questionCount < 4)
                            @if (old('quiz_question_id') == $question->id)
                                <option value="{{ $question->id }}">{{ $question->question}}</option>    
                            @else
                                <option value="{{ $question->id }}">{{ $question->question}}</option>
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
        <p class="text-[#141414] text-[20px] font-Urbanist font-semibold mt-9">Answer 1</p>
        <p class="text-[#535355] text-[14px] font-Urbanist font-medium mt-1"><span class="text-red-500 text-[20px]">*</span>Choose answer using Text or Image</p>
        <hr class="mt-1">

        
        <div class="grid grid-cols-1 mt-3 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"><span class="text-red-500 text-[20px]">*</span>Answer Text</label>
                <input name="answers[0][answer_text]" id="answer_text" value="{{ old('answer_text') }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter answer text.." @error('answer_text') is-invalid @enderror
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
                <input name="answers[0][answer_image]" id="answer_image" value="{{ old('answer_image') }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter answer image.." @error('answer_image') is-invalid @enderror
                />
                @error('answer_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <img class="img-preview" style="display: none;" id="img-preview" src="" frameborder="0"></img>

            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Point</label>
                <input name="answers[0][point]" id="point" value="{{ old('point') }}"
                    type="number"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter point.." @error('point') is-invalid @enderror
                />
                @error('point')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Is Correct</label
                >
                <select name="answers[0][is_correct]" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('is_correct') is-invalid @enderror>
                    <option value="" disabled>Select Correct or Incorrect</option>
                            @if (old('is_correct') == "true")
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
        <p class="text-[#141414] text-[20px] font-Urbanist font-semibold mt-9">Answer 2</p>
        <p class="text-[#535355] text-[14px] font-Urbanist font-medium mt-1"><span class="text-red-500 text-[20px]">*</span>Choose answer using Text or Image</p>
        <hr class="mt-1">
        
        <div class="grid grid-cols-1 mt-3 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"><span class="text-red-500 text-[20px]">*</span>Answer Text</label>
                <input name="answers[1][answer_text]" id="answer_text" value="{{ old('answer_text') }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter answer text.." @error('answer_text') is-invalid @enderror
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
                <input name="answers[1][answer_image]" id="answer_image" value="{{ old('answer_image') }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter answer image.." @error('answer_image') is-invalid @enderror
                />
                @error('answer_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <img class="img-preview" style="display: none;" id="img-preview" src="" frameborder="0"></img>

            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Point</label>
                <input name="answers[1][point]" id="point" value="{{ old('point') }}"
                    type="number"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter point.." @error('point') is-invalid @enderror
                />
                @error('point')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Is Correct</label
                >
                <select name="answers[1][is_correct]" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('is_correct') is-invalid @enderror>
                    <option value="" disabled>Select Correct or Incorrect</option>
                            @if (old('is_correct') == "true")
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
        <p class="text-[#141414] text-[20px] font-Urbanist font-semibold mt-9">Answer 3</p>
        <p class="text-[#535355] text-[14px] font-Urbanist font-medium mt-1"><span class="text-red-500 text-[20px]">*</span>Choose answer using Text or Image</p>
        <hr class="mt-1">
        
        <div class="grid grid-cols-1 mt-3 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"><span class="text-red-500 text-[20px]">*</span>Answer Text</label>
                <input name="answers[2][answer_text]" id="answer_text" value="{{ old('answer_text') }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter answer text.." @error('answer_text') is-invalid @enderror
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
                <input name="answers[2][answer_image]" id="answer_image" value="{{ old('answer_image') }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter answer image.." @error('answer_image') is-invalid @enderror
                />
                @error('answer_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <img class="img-preview" style="display: none;" id="img-preview" src="" frameborder="0"></img>

            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Point</label>
                <input name="answers[2][point]" id="point" value="{{ old('point') }}"
                    type="number"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter point.." @error('point') is-invalid @enderror
                />
                @error('point')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Is Correct</label
                >
                <select name="answers[2][is_correct]" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('is_correct') is-invalid @enderror>
                    <option value="" disabled>Select Correct or Incorrect</option>
                            @if (old('is_correct') == "true")
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
        <p class="text-[#141414] text-[20px] font-Urbanist font-semibold mt-9">Answer 4</p>
        <p class="text-[#535355] text-[14px] font-Urbanist font-medium mt-1"><span class="text-red-500 text-[20px]">*</span>Choose answer using Text or Image</p>
        <hr class="mt-1">
        
        <div class="grid grid-cols-1 mt-3 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"><span class="text-red-500 text-[20px]">*</span>Answer Text</label>
                <input name="answers[3][answer_text]" id="answer_text" value="{{ old('answer_text') }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter answer text.." @error('answer_text') is-invalid @enderror
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
                <input name="answers[3][answer_image]" id="answer_image" value="{{ old('answer_image') }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter answer image.." @error('answer_image') is-invalid @enderror
                />
                @error('answer_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <img class="img-preview" style="display: none;" id="img-preview" src="" frameborder="0"></img>

            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Point</label>
                <input name="answers[3][point]" id="point" value="{{ old('point') }}"
                    type="number"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter point.." @error('point') is-invalid @enderror
                />
                @error('point')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Is Correct</label
                >
                <select name="answers[3][is_correct]" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('is_correct') is-invalid @enderror>
                    <option value="" disabled>Select Correct or Incorrect</option>
                            @if (old('is_correct') == "true")
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
        <div class="flex items-center gap-2 mt-[26px]">
            <button type="s" class="py-[14px] px-4 bg-[#6E62E5] text-white rounded-[8px]">Add New Answer</button>
            <button class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Cancel Add</button>
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

        function previewImage() {
            const imgInputs = document.querySelectorAll('input[type="file"][name^="answers"]');

            imgInputs.forEach(input => {
                const img = input;
                const imgPreview = input.parentElement.querySelector('.img-preview');
                
                if (img.files.length > 0) {
                    const blob = URL.createObjectURL(img.files[0]);
                    imgPreview.style.display = 'block';
                    imgPreview.style.height = '100px';
                    imgPreview.src = blob;
                } else {
                    imgPreview.style.display = 'none';
                }
            });
        }

    </script>
@endsection