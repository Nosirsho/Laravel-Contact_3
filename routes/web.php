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

Auth::routes();
Route::get('/contact_all', 'ContactController@allContacts')->name('contact_all');
Route::get('/contact_all/group', 'ContactController@allGroup')->name('contact_all_group');
Route::get('/contact_all/group/{group}', 'ContactController@oneGroup')->name('contact_one_group');
Route::get('/contact_all/{id}', 'ContactController@showOneContact')->name('contact_one');
Route::get('/contact_all/{id}/update', 'ContactController@updateContact')->name('contact_update');
Route::get('/contact_all/{id}/delete', 'ContactController@deleteContact')->name('contact_delete');
Route::post('/contact_all/{id}/update', 'ContactController@updateContactSubmit')->name('contact_update_submit');
Route::post('/contact_add', 'ContactController@addContact')->name('contact_add');
Route::get('/home', 'HomeController@index')->name('home');
