<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;
use App\Models\Candidate;

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


//user relational
//homepage route
Route::get('/' , [UserController::class , 'showCorrectpage'])->name('login');
//register the user route
Route::post('/register-user' , [UserController::class , 'register'])->middleware('guest');
//login the user route
Route::post('/login-user' , [UserController::class , 'login'])->middleware('guest');
//signout the user route
Route::post('/signout-user' , [UserController::class , 'signout'])->middleware('auth');
//vote page route
Route::get('/voted-page/{user}/{candidate}' , [UserController::class , 'checkVote'])->middleware('auth');
//see the user profile route
Route::get('/profile/{user}' , [UserController::class , 'showProfile'])->middleware('auth');
//change the setting and info form route
Route::get('/change-settings/{user}/form' , [UserController::class , 'showChangeSettingForm'])->middleware('auth');
//do the changes of info route
Route::put('/update-inputs/{user}' , [UserController::class , 'update'])->middleware('auth');
//show the forget password page route
Route::get('/forget-password' , [UserController::class , 'changeTheForgetPasswordForm'])->middleware('guest');
//do the changes of the password
Route::put('/forget-password/change' , [UserController::class , 'changeTheForgetPassword'])->middleware('guest');



//candidate relational
//show the form for being a candidate
Route::get('/candidate-info' , [CandidateController::class , 'showCandidateInfo'])->middleware('auth');
//register the candidate
Route::post('/register-candidate' , [CandidateController::class, 'registerCandidate'])->middleware('auth');
//show the candidate list 
Route::get('/candidate-list-page' , [CandidateController::class , 'showCandidateList'])->middleware('auth');
//send candidate form 
Route::get('/candidate/{candidate}' , [CandidateController::class , 'showVoteCandidate'])->middleware('auth');
//search among candidates
Route::get('/search' , [CandidateController::class , 'search'])->middleware('auth');
//show the result of the candidate
Route::get('/percentage-page' , [CandidateController::class , 'showResult'])->middleware('auth');

