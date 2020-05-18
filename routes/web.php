<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/students', 'StudentsController@index');
$router->post('/students', 'StudentsController@store');
$router->get('/students/{id}', 'StudentsController@show');
$router->put('/students/{id}', 'StudentsController@update');
$router->delete('/students/{id}', 'StudentsController@destroy');