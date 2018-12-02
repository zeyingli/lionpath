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

Route::get('/register', function() {
	return redirect('/');
});

Route::get('/home', function() {
	return redirect('/dashboard');
});

Auth::routes();

// User Dashboard
Route::get('/dashboard', 'FrontendController@dashboard')->name('User Dashboard');

// Schedule
Route::get('/schedule/class', 'FrontendController@classSchedule')->name('Class Schedule');
Route::get('/schedule/exam', 'FrontendController@examSchedule')->name('Exam Schedule');

// Locating Classroom
Route::get('/find/class', 'FrontendController@locateAllRoom')->name('Locating All Classrooms');
Route::get('/find/exam/{id}', 'FrontendController@locateExamRoom')->name('Locating Exam Classroom');

// Exam Notification
Route::post('/notification/add', 'FrontendController@addNotification')->name('Adding Notification');
