<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use \App\Http\Controllers\TestController;
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

Route::get('/', function() {
    return view('welcome');
});

/*questions*/
Route::get('/question', [QuestionController::class ,'index'])->name('question');
Route::get('/question/show/{id}', [QuestionController::class ,'show'])->name('question.show');







/*answer*/








// register & login
Route::middleware('Is-Guest')->group(function (){




    Route::get('register',[\App\Http\Controllers\Authcontroller::class,'getregisterform'])->name('getregisterform');
    Route::post('register/store',[\App\Http\Controllers\Authcontroller::class,'register'])->name('register.store');

    Route::get('login',[\App\Http\Controllers\Authcontroller::class,'loginform'])->name('loginform');
    Route::post('login',[\App\Http\Controllers\Authcontroller::class,'login'])->name('login');



});





Route::middleware('Is-login')->group(function (){


    Route::get('/question/create', [QuestionController::class ,'create']);
    Route::post('/question/store', [QuestionController::class ,'store']);

    Route::get('/question/edite/{id}', [QuestionController::class ,'edit'])->name('question.edite');
    Route::post('/question/update/{id}', [QuestionController::class ,'update'])->name('question.update');

    Route::get('/question/delet/{id}', [QuestionController::class ,'destroy'])->name('delet.question');




    Route::get('/answer/create/{id}',[\App\Http\Controllers\Answercontroller::class ,'create']);

    Route::post('/answer/store/{id}',[\App\Http\Controllers\Answercontroller::class ,'store'])->name('answer.store');

    Route::get('/answer/edite/{id}', [\App\Http\Controllers\Answercontroller::class ,'edit'])->name('answer.edite');

    Route::post('/answer/update/{id}', [\App\Http\Controllers\Answercontroller::class ,'update'])->name('answer.update');

    Route::get('/answer/delet/{id}', [\App\Http\Controllers\Answercontroller::class ,'destroy'])->name('delet');
    Route::get('logout',[\App\Http\Controllers\Authcontroller::class,'logout'])->name('logout');




});

Route::get('/test',  [\App\Http\Controllers\TestController::class ,'index']);
// tags


Route::get('/tag/index',[\App\Http\Controllers\Tagscontroller::class ,'index'])->name('tag.index');

Route::get('/tag/show/{id}',[\App\Http\Controllers\Tagscontroller::class ,'show'])->name('tag.show');


//Route::get('/test', [TestController::class ,'test']);
