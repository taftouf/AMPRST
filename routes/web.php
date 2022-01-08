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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify' => true]);

// adherent
Route::get('home', 'HomeController@index')->name('home');
//modif des donnees
Route::get('/adherent/{user}/edit', 'HomeController@edit')->name('adherent.edit');
Route::patch('/adherent/{user}', 'HomeController@update')->name('adherent.update');
// modification de mot de passe
Route::get('/adherent/{user}/editPass', 'HomeController@editPass')->name('adherent.editPass');
Route::patch('/adherent/{user}/Pass', 'HomeController@updatePass')->name('adherent.updatePass');

Route::post('/participer', 'HomeController@store')->name('participer.store');
Route::post('/aparticiper', 'HomeController@destroy')->name('participer.destroy');



// admin

Route::get('adminHome', 'AdminController@indexAdmin')->name('adminHome');
Route::get('index' , 'AdminController@index')->name('index');
Route::delete('/admin/{user}','AdminController@destroy')->name('user.destroy');
Route::get('/admin/detail/{user}','AdminController@detail')->name('user.detail');


// mail

Route::get('/sendemail', 'MailController@index');
Route::post('/sendemail/send', 'MailController@send');


// events

Route::middleware(['auth', 'admin'])->group(function () {
       Route::view('/Evenement','Event.script');
       Route::resource('/events' , 'EventController');
});
Route::get('/Event' , 'EventController@indexEvent')->name('Event.index');



