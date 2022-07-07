<?php

use Illuminate\Support\Facades\Route;

$localizationGroupData = [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
];

Route::group($localizationGroupData, function() {
    Route::view('/', 'welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {

    Route::view('about', 'about')->name('about');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
