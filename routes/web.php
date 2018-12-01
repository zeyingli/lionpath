<?php

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
    if (!Agent::isDesktop()) {
        return redirect('/login');
    }

    return view('frontend.landing');
})->name('Landing Page');

Auth::routes();

// User Dashboard
Route::get('/dashboard', 'FrontendController@dashboard')->name('User Dashboard');
