<?php

Route::get('/', 'BooksController@last5');

Route::get('libros/registrar', 'BooksController@registrar');



Route::get('libros/detalles/{id}', 'BooksController@detalles_libro');
Route::post('libros/guardar', 'BooksController@guardar');

//Route::resource('libro_lugar', 'LibrosLugaresController');



Route::group(['middleware' => ['web']], function () {
    //
});


