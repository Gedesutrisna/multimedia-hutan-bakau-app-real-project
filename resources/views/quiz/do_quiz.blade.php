@extends('layouts.main')
@section('container')

<!-- Main content -->
<div class="content-main p-[32px] h-[100vh]">
    <p id="countdown">{{ $quiz->duration }}</p>
    <form id="quizForm" action="/quiz/results" method="POST" class="space-y-4">
        @csrf
        @method('POST')
        <!-- Question Loop -->
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        @foreach ($quiz->questions as $questionIndex => $question)
        <div class="flex flex-col mb-4" style="display: {{ $questionIndex == 0 ? 'flex' : 'none' }};">
            <label for="q{{ $loop->iteration }}" class="text-lg text-gray-800 mb-2">
                {{ $loop->iteration }}. {{ $question->question }}
            </label>
            <input type="hidden" name="questions[{{ $questionIndex }}][quiz_question_id]" value="{{ $question->id }}">
            @foreach ($question->answers as $answerIndex => $answer)
                
            <div class="flex items-center space-x-4">
                <input type="radio" id="q{{ $loop->parent->iteration }}a{{ $answerIndex }}" name="answers[{{ $questionIndex }}][answer_id]"
                value="{{ $loop->iteration }}" class="mr-2" required>
                <label for="q{{ $loop->parent->iteration }}a{{ $answerIndex }}" class="text-gray-700">
                    @if (empty($answer->answer_image))
                        
                    {{ $answer->option }}) {{ $answer->answer_text ?? '' }}
                    @else
                    <div class="flex gap-3">
                        {{ $answer->option }})  <img src="{{ asset('images/'.$answer->answer_image) }}" alt="" style="width: 40px">
                    </div>
                        
                    @endif
                </label>
            </div>
            @endforeach
        </div>
        @endforeach
        

        <hr>

        <!-- Navigation Buttons -->
        <div class="flex justify-between">
            <button type="button" onclick="prevQuestion()"
                class="bg-blue-500 hover:bg-blue-600 
                    text-white px-2 py-1 rounded-md">
                Previous
            </button>
            <button type="button" onclick="nextQuestion()"
                    class="bg-blue-500 hover:bg-blue-600 
                        text-white px-4 py-1 rounded-md">
                Next
            </button>
        </div>
        <hr>

        <button type="button" onclick="submitQuiz()"
                class="bg-green-500 text-white px-4 py-2 
                rounded-md mt-8">
            Submit
        </button>
    </form>

</div>
</div>

<script>
let currentQuestionIndex = 0;

function showQuestion(index) {
    const questions = document.querySelectorAll('.flex.flex-col');
    questions.forEach((question, i) => {
        question.style.display = i === index ? 'flex' : 'none';
    });
}

function nextQuestion() {
    currentQuestionIndex = Math.min(currentQuestionIndex + 1, {{ count($quiz->questions) - 1 }});
    showQuestion(currentQuestionIndex);
}

function prevQuestion() {
    currentQuestionIndex = Math.max(currentQuestionIndex - 1, 0);
    showQuestion(currentQuestionIndex);
}

function submitQuiz() {
    // Hapus nilai yang tersimpan di local storage
    localStorage.removeItem('remainingTime');
    // Kirim formulir kuis
    document.getElementById("quizForm").submit();
}


showQuestion(currentQuestionIndex);


const countdownElement = document.getElementById('countdown');
let duration = parseInt('{{ $quiz->duration }}'); 
let totalSeconds = duration * 60;

const remainingTime = localStorage.getItem('remainingTime');
if (remainingTime) {
    totalSeconds = parseInt(remainingTime);
}

let timer = setInterval(() => {
    let minutes = Math.floor(totalSeconds / 60);
    let seconds = totalSeconds % 60;

    let timeString = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    countdownElement.textContent = timeString;

    totalSeconds--;

    localStorage.setItem('remainingTime', totalSeconds.toString());

    if (totalSeconds < 0) {
        clearInterval(timer);
        submitQuiz(); 
    }
}, 1000);


</script>
@endsection
