<?php

use App\Http\Controllers\BallController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\BucketSuggestionController;
use App\Models\Ball;
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

Route::get('/', function () {
    $balls = Ball::all();
    return view('game',compact('balls'));
});


Route::resource('buckets',BucketController::class);
Route::resource('balls',BallController::class);
Route::resource('bucketSuggestions',BucketSuggestionController::class);