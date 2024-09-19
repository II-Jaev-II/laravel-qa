<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/questions', [QuestionsController::class, 'index'])->name('questions.index');
Route::get('/questions-create', [QuestionsController::class, 'create'])->name('questions.create');
Route::post('/questions-store', [QuestionsController::class, 'store'])->name('questions.store');
Route::get('/questions-edit/{id}', [QuestionsController::class, 'edit'])->name('questions.edit');
Route::put('/questions-update/{question}', [QuestionsController::class, 'update'])->name('questions.update');
Route::delete('/questions-destroy/{question}', [QuestionsController::class, 'destroy'])->name('questions.destroy');

Route::bind('slug', function ($slug) {
    return Question::where('slug', $slug)->first() ?? abort(404);
});

Route::get('/questions/{slug}', [QuestionsController::class, 'show'])->name('questions.show');

require __DIR__ . '/auth.php';
