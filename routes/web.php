<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
    $data = [];
    $locale = app()->getLocale();
    $data['locale'] = $locale;
    return view('welcome', $data);
});
// example google translate
Route::get('/trans', function () {
    return GoogleTranslate::trans('I like the french gastronomie', 'fr');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
