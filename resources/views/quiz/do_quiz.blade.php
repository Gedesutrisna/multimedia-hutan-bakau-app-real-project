@extends('layouts.main-no-tb')
@section('container')
<div class="container mx-auto">
    <div class="py-[50px] xl:px-[100px] 2xl:px-[185px]">
        <form id="quizForm" action="/quiz/results" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <div class="flex justify-center ">
                <div class="absolute w-[200px] py-[12px] bg-[#428574] rounded-[200px] text-center font-Urbanist font-bold text-white top-[24px]">
                    <p id="countdown">{{ $quiz->duration }}</p>
                </div>
                <div class="">
                    @foreach ($quiz->questions as $questionIndex => $question)
                    <div class="box-question">
                        <div class="bg-white w-[100%]  rounded-[4px] p-[40px]">
                            @if (empty($question->image))
                            @else
                            <img class="w-[100px] h-[100px] mx-auto my-3" src="{{ asset('/images'.$question->image) }}" alt="">
                            @endif
                            <label for="q{{ $loop->iteration }}" class="text-lg text-gray-800">
                                <p class="font-Urbanist mt-3 text-[16px] font-medium text-[#101828]"> {{ $loop->iteration }}. {{ $question->question }} </p>
                            </label>
                            <input type="hidden" name="questions[{{ $questionIndex }}][quiz_question_id]" value="{{ $question->id }}">
                        </div>
                        <div class="grid grid-cols-2 gap-[24px] mt-[24px]">
                            @foreach ($question->answers as $answerIndex => $answer)
                            <div class="box-answer w-full h-full bg-white rounded-[12px] p-[18px] ">
                                <input type="radio" id="q{{ $loop->parent->iteration }}a{{ $answerIndex }}" name="answers[{{ $questionIndex }}][answer_id]"
                                value="{{ $loop->iteration }}" class="mr-2" required>
                                <label for="q{{ $loop->parent->iteration }}a{{ $answerIndex }}" class="text-gray-700">
                                    @if (empty($answer->answer_image) && !empty($answer->answer_text))
                                        <p class="font-Urbanist text-[16px] font-medium text-[#101828]"> {{ $answer->option }}. {{ $answer->answer_text }} </p>
                                    @elseif (!empty($answer->answer_image) && empty($answer->answer_text))
                                    <div class="flex gap-2">
                                        <p class="font-Urbanist text-[16px] font-medium text-[#101828]"> {{ $answer->option }}.</p> <img src="{{ asset('images/'.$answer->answer_image) }}" alt="" style="width: 40px">
                                    </div>
                                    @elseif (empty($answer->answer_image) && empty($answer->answer_text))
                                        -
                                    @endif  
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
         <div class="flex justify-between mt-[24px]">
            <button type="button" onclick="prevQuestion()"
                class="bg-[#D9E9E4] font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[20px] sm:px-[40px] rounded-[6px]">
                Previous
            </button>
            <button type="button" onclick="nextQuestion()"
                class="bg-[#D9E9E4] font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[20px] sm:px-[40px] rounded-[6px]" 
                id="nextButton">
                Next
            </button>
            <button type="button" onclick="submitQuiz()"
                class="bg-[#1A3C40] font-Urbanist text-base font-semibold text-white py-4 px-[20px] sm:px-[40px] rounded-[6px]" 
                style="display: none;" 
                id="submitButton">
                Submit
            </button>
        </form>
    </div>
</div>

<script>
let currentQuestionIndex = 0;
const totalQuestions = {{ count($quiz->questions) }};

function showQuestion(index) {
    const questions = document.querySelectorAll('.box-question');
    questions.forEach((question, i) => {
        question.style.display = i === index ? 'block' : 'none';
    });
    if (index === totalQuestions - 1) {
        document.getElementById('nextButton').style.display = 'none';
        document.getElementById('submitButton').style.display = 'block';
    } else {
        document.getElementById('nextButton').style.display = 'block';
        document.getElementById('submitButton').style.display = 'none';
    }
}

function saveAnswer(questionIndex, answerIndex) {
    const answers = JSON.parse(localStorage.getItem('answers')) || [];
    answers[questionIndex] = answerIndex;
    localStorage.setItem('answers', JSON.stringify(answers));
}

function loadSavedAnswer() {
    const answers = JSON.parse(localStorage.getItem('answers'));
    if (answers && answers.length > 0) {
        currentQuestionIndex = answers.length - 1;
        for (let i = 0; i < answers.length; i++) {
            if (answers[i] !== undefined) {
                document.querySelector(`input[name="answers[${i}][answer_id]"][value="${answers[i]}"]`).checked = true;
            }
        }
    }
}

loadSavedAnswer();

function submitQuiz() {
    localStorage.removeItem('remainingTime');
    localStorage.removeItem('answers');
    document.getElementById("quizForm").submit();
}

function nextQuestion() {
    const selectedAnswer = document.querySelector(`input[name="answers[${currentQuestionIndex}][answer_id]"]:checked`);
    if (selectedAnswer) {
        saveAnswer(currentQuestionIndex, selectedAnswer.value);
    }
    currentQuestionIndex = Math.min(currentQuestionIndex + 1, totalQuestions - 1);
    showQuestion(currentQuestionIndex);
}

function prevQuestion() {
    const selectedAnswer = document.querySelector(`input[name="answers[${currentQuestionIndex}][answer_id]"]:checked`);
    if (selectedAnswer) {
        saveAnswer(currentQuestionIndex, selectedAnswer.value);
    }
    currentQuestionIndex = Math.max(currentQuestionIndex - 1, 0);
    showQuestion(currentQuestionIndex);
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