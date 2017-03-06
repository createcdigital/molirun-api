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

$app->post('user/add', 'UserController@add');
$app->get('user/id/{card_number}', 'UserController@getByCardNumber');

$app->get('stock/get', 'StockController@get');


$app->get('api/example', function(){
    return view('api-example');
});