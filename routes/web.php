<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::middleware('auth','web')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('create-post', [App\Http\Controllers\PostController::class, 'createpost'])->name('createpost');

    Route::post('create-follower', [App\Http\Controllers\FollowerController::class, 'addfollower'])->name('addfollower');
});
