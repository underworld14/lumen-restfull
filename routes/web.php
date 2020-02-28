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

// generate app random string
$router->get('/key', function() {
    $str = rand();
    $result = md5($str);
    return $result;
});

// auth api
$router->group(['prefix' => 'api/auth'], function() use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});

// todos api
$router->group(['prefix' => 'api/todos'], function() use ($router) {
    $router->get('/', 'TodosController@index');
    $router->get('/{id}', 'TodosController@view');
    $router->post('/', 'TodosController@store');
    $router->patch('/{id}', 'TodosController@update');
    $router->delete('/{id}', 'TodosController@delete');
});

// authors api
$router->group(['prefix' => 'api/authors'], function() use ($router) {
    $router->get('/', 'AuthorController@index');
    $router->get('/{id}', 'AuthorController@view');
    $router->post('/', 'AuthorController@store');
    $router->patch('/{id}', 'AuthorController@update');
    $router->delete('/{id}', 'AuthorController@delete');
});


