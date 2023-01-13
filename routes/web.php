<?php

use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UserController::class,'loginPage'])->name("loginPage");
Route::post('login-user', [UserController::class, 'loginUSer'])->name("loginUser");

Route::get('/registration',[UserController::class,'registrationPage'])->name("registrationPage");
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register');

Route::get('/dashboard', [QuizController::class, 'dashboardPage'])->name("dashPage");
Route::get('/admin-dashboard', [QuizController::class, 'adminDashboardPage'])->name("adminDashPage");

Route::get('/add', [QuizController::class,'addQuizPage'])->name("addYourQuizPage");
Route::post('/add-quiz', [QuizController::class, 'addQuiz'])->name("addQuiz");

Route::get('/edit/{quizId}', [QuizController::class, "editPage"])->name("editQuizPage");
Route::post('/edit-quiz/{quizId}', [QuizController::class, "editQuiz"])->name("editQuiz");

Route::get('/add-question-view', [QuestionsController::class, "questionPage"])->name("questionPage");
Route::post('/add-question', [QuestionsController::class, "addQuestion"])->name("addQuestionRoute");