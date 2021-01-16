<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [TweetController::class, 'index'])->name('home');

    Route::resource('tweets', TweetController::class);
    Route::resource('profile', ProfileController::class)->except(['show'])->parameters([
        'profile' => 'user'
    ]);

    Route::post('profile/{user:username}/follow', [FollowsController::class, 'store'])->name('profile.follow');
    Route::get('explore', [ExploreController::class, 'index'])->name('explore.index');
});

Route::get('profile/{user:username}', [ProfileController::class, 'show'])->name('profile.show');


Auth::routes();
