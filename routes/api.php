<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*
    User routes
*/
Route::post('/register', 'Api\V1\UserController@register' ); //Регистрация
Route::post('/login', 'Api\V1\UserController@login' ); //Авторизация


/*
    Contact routes
*/
 Route::group(['middleware' => ['auth:api']], function ()
 {
     Route::post('/contact/add', 'Api\V1\ContactController@addContact' ); //Добавить контакт
     Route::get('/contact/all', 'Api\V1\ContactController@allContacts' ); //Список контактов
     Route::get('/contact/{id}', 'Api\V1\ContactController@oneContact' ); //Получить один контакт по id
     Route::delete('/contact/delete/{id}', 'Api\V1\ContactController@deleteContact' ); //Удалить контакт
     Route::put('/contact/update/{id}', 'Api\V1\ContactController@updateContact' ); //Изменить контакт
     Route::get('/contact/all/{group}', 'Api\V1\ContactController@allGroup' ); //Список группы контакта
 });
