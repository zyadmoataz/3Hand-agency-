<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Locale switcher
Route::get('/locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return redirect()->back();
})->name('locale.switch');

// Users CRUD (resource controller)
Route::resource('users', UserController::class);
