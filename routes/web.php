<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return redirect(url('/jobs'));
});

Route::group(['prefix' => 'jobs', 'as' => 'job'], function() {
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/{job}/show', [JobController::class, 'show'])->name('show');
});



