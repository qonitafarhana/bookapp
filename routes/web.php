<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/key', function () {
    return \Illuminate\Support\Str::random(32);
});

//crud author
$router->get('author', 'AuthorController@index');
$router->get('author/{id}','AuthorController@Id');
$router->post('author', 'AuthorController@store');
$router->put('author/{id}', 'AuthorController@update');
$router->delete('author/{id}', 'AuthorController@destroy');

//crud buku
$router->get('book', 'BooksController@index');
$router->get('book/{id}','BooksController@Id');
$router->post('book', 'BooksController@store');
$router->put('book/{id}', 'BooksController@update');
$router->delete('book/{id}', 'BooksController@destroy');



