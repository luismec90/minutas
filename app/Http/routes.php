<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/mis-documentos', ['as' => 'user.documents', 'uses' => 'DocumentsController@index']);
        Route::post('/mis-documentos', ['as' => 'user.documents', 'uses' => 'DocumentsController@store']);
        Route::post('/document/delete', ['as' => 'user.documents.delete', 'uses' => 'DocumentsController@destroy']);
    });
});

Route::group(['middlewareGroups' => ['web']], function () {
    Route::get('/', 'MinutasController@index');
    Route::get('/descargas', 'MinutasController@lists');
    Route::post('/generate', 'MinutasController@generate');
    Route::post('/contact', 'MinutasController@mail');
});
