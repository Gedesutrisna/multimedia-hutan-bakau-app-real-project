<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\QuizController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\QuizAnswerController;
use App\Http\Controllers\admin\QuizResultController;
use App\Http\Controllers\admin\QuizQuestionController;
use App\Http\Controllers\BlogController as ControllersBlogController;
use App\Http\Controllers\QuizController as ControllersQuizController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\QuizResultController as ControllersQuizResultController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/blogs', BlogController::class);

    Route::resource('/categories', CategoryController::class);

    Route::get('/quizzes/{quiz}/questions/{question}', [QuizQuestionController::class, 'show'])->name('question.show');
    Route::get('/quizzes/{quiz}/questions/{question}/answers/{answer}', [QuizAnswerController::class, 'show'])->name('question.show');
    Route::resource('/quizzes', QuizController::class);

    Route::get('/questions/bulk-create', [QuizQuestionController::class, 'bulkCreate'])->name('question.create');
    Route::post('/questions/bulk-create', [QuizQuestionController::class, 'bulkStore'])->name('question.create');
    Route::get('/questions/bulk-create-dumy', [QuizQuestionController::class, 'bulkCreateDumy'])->name('question.create');
    Route::post('/questions/bulk-create-dumy', [QuizQuestionController::class, 'bulkStoreDumy'])->name('question.create');
    Route::resource('/questions', QuizQuestionController::class);

    Route::get('/answers/bulk-create', [QuizAnswerController::class, 'bulkCreate'])->name('answer.create');
    Route::post('/answers/bulk-create', [QuizAnswerController::class, 'bulkStore'])->name('answer.create');
    Route::get('/answers/bulk-create-dumy', [QuizAnswerController::class, 'bulkCreateDumy'])->name('answer.create');
    Route::post('/answers/bulk-create-dumy', [QuizAnswerController::class, 'bulkStoreDumy'])->name('answer.create');
    Route::resource('/answers', QuizAnswerController::class);

    Route::resource('/quiz/results', QuizResultController::class);

    Route::resource('/users', AdminUserController::class);
    
    Route::get('/profile', [AdminController::class, 'index'])->name('profile');
    Route::put('/profile/update', [AdminController::class, 'update'])->name('admin.update');
});


Route::group([ 'middleware' => ['auth:web']], function () {
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/quiz/{quiz}/attempt', [ControllersQuizResultController::class, 'show']);
    Route::resource('/quiz/results', ControllersQuizResultController::class);
});


Route::resource('/quizzes', ControllersQuizController::class);
Route::resource('/blogs', ControllersBlogController::class);

//user
Route::get('/login', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class,'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

//admin
Route::get('/login/admin', [AdminLoginController::class,'index'])->middleware('guest')->name('login.admin');
Route::post('/login/admin', [AdminLoginController::class,'login'])->middleware('guest');
Route::post('/logout/admin', [AdminLoginController::class, 'logout']);

//user
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->middleware('guest');
