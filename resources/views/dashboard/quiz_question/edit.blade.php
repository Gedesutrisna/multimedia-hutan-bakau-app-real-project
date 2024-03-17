@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->



    <div class="content-main p-[32px]">
        <div class="flex gap-3">
            <a href="/dashboard/quizzes/{{ $question->quiz->slug }}">
                <img src="/asset/back logo.svg" alt="">
            </a>
            <p class="text-[#141414] text-[28px] font-Urbanist font-semibold">Edit Pertanyaan</p>
        </div>
        <form action="/dashboard/questions/{{ $question->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium"
                    >Kuis</label
                >
                <select name="quiz_id" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('quiz_id') is-invalid @enderror>
                    @foreach ($quizzes as $quiz)
                    @php
                        $questionCount = $quiz->questions()->count();
                    @endphp
                        @if (old('quiz_id', $question->quiz_id) == $quiz->id)
                            <option value="{{ $quiz->id }}" selected>{{ $quiz->name}}</option>    
                        @else
                            @if ($questionCount < 15)
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
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Jawaban Benar</label>
                <select name="correct" id="" class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none" @error('correct') is-invalid @enderror>
                    <option value="A" {{ (old('correct', $question->correct) == 'A') ? 'selected' : '' }}>A</option>
                    <option value="B" {{ (old('correct', $question->correct) == 'B') ? 'selected' : '' }}>B</option>
                    <option value="C" {{ (old('correct', $question->correct) == 'C') ? 'selected' : '' }}>C</option>
                    <option value="D" {{ (old('correct', $question->correct) == 'D') ? 'selected' : '' }}>D</option>
                </select>                
                @error('correct')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Pertanyaan</label>
                <input name="question" id="question" value="{{ old('question',$question->question) }}"
                    type="text"
                    class="mt-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none"
                    placeholder="Enter question.." @error('question') is-invalid @enderror
                />
                @error('question')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 mt-9 gap-4">
            <div class="">
                <label for="" class="block text-[14px] font-Urbanist text-[#535355] font-medium">Gambar</label>
                <input name="image" id="image" value="{{ old('image', $question->image) }}" onchange="previewImage()"
                    type="file"
                    class="my-2 py-[18px] px-[16px] w-full border border-[#E1E2E6] rounded-[4px] focus:outline-none bg-white"
                    placeholder="Enter image.." @error('image') is-invalid @enderror
                />
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                @if($question->image)
                <img class="img-preview" id="img-preview" src="{{ asset('images/'.$question->image) }}" frameborder="0" style="width: 200px">
                @else
                <img class="img-preview" id="img-preview" src="" frameborder="0">
                @endif
            </div>
        </div>

        <input type="hidden" class="form-control @error('slug') is-invalid @enderror form-control-sm" name="slug" id="slug" value="{{ old('slug', $question->id) }}" required>
        <div class="flex items-center gap-2 mt-[26px]">
            <button type="submit" class="py-[14px] px-4 bg-[#6E62E5] text-white rounded-[8px]">Edit Pertanyaan</button>
            <button class="py-[14px] px-4 bg-[#ADAEB1] text-white rounded-[8px]">Batal Edit</button>
        </div>
    </form>

    </div>
    <script>

        const titleInput = document.querySelector('#title');
        const slugInput = document.querySelector('#slug');

        titleInput.addEventListener('change', function() {
        const titleValue = titleInput.value.toLowerCase().trim().replace(/\s+/g, '-');
        slugInput.value = titleValue;
        });

        function previewImage(){
            const img = document.querySelector('#image');
            const imgPreview = document.querySelector('#img-preview');
            imgPreview.style.display = 'block';
            imgPreview.style.height = '200px';
            const blob = URL.createObjectURL(img.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection