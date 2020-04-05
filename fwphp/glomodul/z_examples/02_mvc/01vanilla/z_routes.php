<?php

namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//use App\Helpers\R oute;

Route::get('/',          'HomeController@index');
Route::get('/user/{id}', 'HomeController@get_user');
// R oute::post('/user/update', 'HomeController@update_user');
