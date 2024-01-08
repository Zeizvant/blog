<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [QuizController::class, 'index'])->name('index')->middleware('auth');
Route::get('/register', [RegisterController::class, 'show'])->name('registration.view');
Route::get('/login', [LoginController::class, 'show'])->name('login.view');
Route::post('/register', [RegisterController::class, 'register'])->name('registration');
Route::post('/login',  [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/add-quiz', [QuizController::class, 'show'])->name('quiz.add')->middleware('auth');
Route::get('/add-question',[QuestionController::class, 'show'])->name('question.add')->middleware('auth');
Route::post('/add-quiz', [QuizController::class, 'store'])->name('quiz.store')->middleware('auth');
Route::post('/add-question', [QuestionController::class, 'store'])->name('question.store')->middleware('auth');
Route::get('/quiz/{id}', [QuizController::class, 'info'])->name('quiz.info')->middleware('auth');
Route::get('/toggle/quiz/{id}', [QuizController::class, 'toggle'])->name('quiz.toggle')->middleware('auth');
Route::get('/quiz/delete/{id}', [QuizController::class, 'delete'])->name('quiz.delete')->middleware('auth');
Route::get('/edit-quiz/{id}', [QuizController::class, 'edit'])->name('quiz.edit')->middleware('auth');
Route::post('/edit-quiz/{id}', [QuizController::class, 'update'])->name('quiz.update')->middleware('auth');
