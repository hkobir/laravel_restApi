<?php

Route::apiResource('/semester','App\Http\Controllers\Api\SemesterController');
Route::apiResource('/subject','App\Http\Controllers\Api\SubjectController');
Route::apiResource('/section','App\Http\Controllers\Api\SectionController');
Route::apiResource('/student','App\Http\Controllers\Api\StudentController');

Route::group([

  'prefix' => 'auth'

], function ($router) {

  Route::post('login', 'App\Http\Controllers\AuthController@login');
  Route::post('logout', 'App\Http\Controllers\AuthController@logout');
  Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
  Route::post('me', 'App\Http\Controllers\AuthController@me');

  Route::post('payload', 'App\Http\Controllers\AuthController@payload');
  Route::post('register', 'App\Http\Controllers\AuthController@register');


});

Route::get('/buses/{route}/{source}/{destination}',"App\Http\Controllers\Api\SemesterController@getBuses");

