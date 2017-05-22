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

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('/phones',      ['uses' => 'App\Http\Controllers\PhonesController@index']);
$app->get('/phones/s:{search}',      ['uses' => 'App\Http\Controllers\PhonesController@search']);
$app->get('/phones/o:{search}',      ['uses' => 'App\Http\Controllers\PhonesController@orderBy']);
$app->get('/phones/{id}-',     ['uses' => 'App\Http\Controllers\PhonesController@delete']);
$app->get('/phones/{id}', ['uses' => 'App\Http\Controllers\PhonesController@read']);
$app->post('/phones',     ['uses' => 'App\Http\Controllers\PhonesController@create']);
$app->post('/phones/{id}',     ['uses' => 'App\Http\Controllers\PhonesController@update']);
