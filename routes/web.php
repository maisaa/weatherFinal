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
    return view('welcome');
});

Route::get('about', function () {
    return 'welcome to about page XD';
});

Route::get('about/me', function () {
    return 'welcome to about/me page XD';
});

Route::get('about/{myVariable}', function($myVariable) {
    return $myVariable.' welcome to your page ';
});

Route::get('about/profile/{myVariable}', function($myVariable) {
    return  "welcome $myVariable";//singel couts dosen't worke with variable
});

Route::get('weather', function () {
    return ' Weather Forecast ';
});