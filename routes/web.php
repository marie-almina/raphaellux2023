<?php

use App\Http\Controllers\Apprendre\ApprendreController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\BD\BDController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Quizz\QuizzController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomepageController::class, 'index']);

Auth::routes();

Route::get('/home', [HomepageController::class, 'index'])->name('home');

Route::get("/apprendre/{id}", [ApprendreController::class, 'index']);

Route::get('/quizz', [QuizzController::class, 'index']);
Route::post('/quizz/getReponse', [QuizzController::class, 'getAnswers'])->name("getAnswers");
Route::post("/showQuestion", [QuizzController::class, 'showQuestion']);

Route::get("/contact", [ContactController::class, 'index']);
Route::post("/contact/envoiMail", [ContactController::class, 'envoiMail']);

Route::get("/bande-dessinee", [BDController::class, 'index']);

Route::get("/404", function(){
    return view("404");
})->name("404");

Route::get("/xmax", function(){
    return view("xmax");
})->name("xmax");
